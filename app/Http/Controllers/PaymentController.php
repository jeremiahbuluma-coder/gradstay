<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // SHOW ALL PAYMENTS (ADMIN)
    public function index()
    {
        $bookings = Booking::with(['listing', 'user'])
            ->whereNotNull('payment_method')
            ->latest()
            ->get();

        return view('admin.payments.index', compact('bookings'));
    }

    // MARK PAYMENT AS PAID
    public function markPaid($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->payment_status = 'paid';
        $booking->status = 'confirmed'; // optional: confirm booking

        $booking->save();

        return back()->with('success', 'Payment marked as paid');
    }
    public function reject($id)
{
    $booking = \App\Models\Booking::findOrFail($id);

    $booking->payment_status = 'failed';
    $booking->status = 'cancelled';

    $booking->save();

    return back()->with('success', 'Payment rejected successfully');
}
}