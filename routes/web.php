<?php  

use App\Models\User;
use App\Models\Listing;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\AdminSettingsController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\MpesaController;

 /*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listings', [ListingController::class, 'index'])
    ->name('listings.index');

/*
|--------------------------------------------------------------------------
| STATIC PAGES
|--------------------------------------------------------------------------
*/

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

/*
|--------------------------------------------------------------------------
| CONTACT FORM SUBMISSION (FIXED ONLY HERE)
|--------------------------------------------------------------------------
*/

Route::post('/contact', function () {

    $data = request()->validate([
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ]);

    ContactMessage::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'message' => $data['message'],
        'is_read' => 0
    ]);

    return back()->with('success', 'Message sent successfully!');
})->name('contact.submit');

/*
|--------------------------------------------------------------------------
| LISTING DETAILS PAGE
|--------------------------------------------------------------------------
*/

Route::get('/listings/{id}', function ($id) {

    $listing = Listing::findOrFail($id);

    return view('listings.show', compact('listing'));

})->name('listings.show');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {

        $user = auth()->user();
        $listings = Listing::latest()->get();

        $bookingCount = 0;

        if ($user) {
            $bookingCount = \App\Models\Booking::where('user_id', $user->id)->count();
        }

        return view('dashboard', compact('listings', 'user', 'bookingCount'));

    })->name('dashboard');

    Route::get('/my-bookings', [BookingController::class, 'index'])
        ->name('bookings.index');

    Route::post('/listings/{listing}/book', [BookingController::class, 'store'])
        ->name('bookings.store');

    Route::get('/admin', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        return view('admin.dashboard');

    })->name('admin.dashboard');

    Route::get('/admin/listings', [ListingController::class, 'adminIndex'])
        ->name('admin.listings.index');

    Route::get('/admin/listings/create', [ListingController::class, 'create'])
        ->name('admin.listings.create');

    Route::post('/admin/listings', [ListingController::class, 'store'])
        ->name('admin.listings.store');

    Route::get('/admin/listings/{id}/edit', function ($id) {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $listing = Listing::findOrFail($id);

        return view('admin.listings.edit', compact('listing'));

    })->name('admin.listings.edit');

    Route::put('/admin/listings/{id}', function ($id) {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $listing = Listing::findOrFail($id);

        if(request()->hasFile('image')){
            $imageName = time().'_'.request()->image->getClientOriginalName();
            request()->image->move(public_path('uploads/images'), $imageName);
            $listing->image = $imageName;
        }

        if(request()->hasFile('video')){
            $videoName = time().'_'.request()->video->getClientOriginalName();
            request()->video->move(public_path('uploads/videos'), $videoName);
            $listing->video = $videoName;
        }

        $listing->update([
            'title' => request('title'),
            'price' => request('price'),
            'location' => request('location'),
            'description' => request('description'),
            'image_url' => request('image_url'),
            'video_url' => request('video_url'),
        ]);

        $listing->save();

        return redirect()->route('admin.listings.index')
            ->with('success', 'Listing updated successfully');

    })->name('admin.listings.update');

    Route::delete('/admin/listings/{id}', [ListingController::class, 'destroy'])
        ->name('admin.listings.destroy');

    Route::get('/admin/users', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $users = User::latest()->get();

        return view('admin.users.index', compact('users'));

    })->name('admin.users');

    Route::delete('/admin/users/{id}', function ($id) {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $user = User::findOrFail($id);

        if ($user->id === auth()->id()) {
            return back()->with('error', 'You cannot delete yourself');
        }

        if ($user->role === 'admin') {
            return back()->with('error', 'Admin users cannot be deleted');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully');

    })->name('admin.users.delete');

    Route::get('/admin/bookings', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $bookings = \App\Models\Booking::where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.bookings.index', compact('bookings'));

    })->name('admin.bookings');

    Route::get('/admin/bookings/{id}/approve', function ($id) {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $booking = \App\Models\Booking::findOrFail($id);

        $booking->update(['status' => 'confirmed']);

        return back()->with('success', 'Booking approved');

    })->name('admin.bookings.approve');

    Route::get('/admin/bookings/{id}/reject', function ($id) {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $booking = \App\Models\Booking::findOrFail($id);

        $booking->update(['status' => 'cancelled']);

        return back()->with('success', 'Booking rejected');

    })->name('admin.bookings.reject');

    Route::get('/admin/messages', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'admin',
            403
        );

        $messages = ContactMessage::latest()->get();

        return view('admin.messages.index', compact('messages'));

    })->name('admin.messages');

    Route::get('/admin/settings', [AdminSettingsController::class, 'index'])
        ->name('admin.settings');

    Route::post('/admin/settings/profile', [AdminSettingsController::class, 'updateProfile'])
        ->name('admin.settings.update');

    Route::post('/admin/settings/password', [AdminSettingsController::class, 'updatePassword'])
        ->name('admin.settings.password');

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS
    |--------------------------------------------------------------------------
    */

    Route::get('/admin/payments', [PaymentController::class, 'index'])
        ->name('admin.payments.index');

    Route::post('/admin/payments/{id}/approve', [PaymentController::class, 'markPaid'])
        ->name('admin.payments.approve');

    Route::post('/admin/payments/{id}/paid', [PaymentController::class, 'markPaid'])
        ->name('admin.payments.paid');

    Route::post('/admin/payments/{id}/reject', [PaymentController::class, 'reject'])
        ->name('admin.payments.reject');

    /*
    | NEW: M-PESA CALLBACK (ADDED)
    */
    Route::post('/mpesa/callback', [MpesaController::class, 'callback'])
        ->name('mpesa.callback');

    Route::get('/landlord/dashboard', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'landlord',
            403
        );

        return view('landlord.dashboard');

    })->name('landlord.dashboard');

    Route::get('/landlord/listings', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'landlord',
            403
        );

        $listings = Listing::where('user_id', auth()->id())->latest()->get();

        return view('landlord.listings.index', compact('listings'));

    })->name('landlord.listings');

    Route::get('/landlord/listings/create', function () {

        abort_if(
            !auth()->check() || auth()->user()->role !== 'landlord',
            403
        );

        return view('landlord.listings.create');

    })->name('landlord.listings.create');

    Route::post('/landlord/listings', [ListingController::class, 'store'])
        ->name('landlord.listings.store');

});

/*
|--------------------------------------------------------------------------
| PASSWORD RESET
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';