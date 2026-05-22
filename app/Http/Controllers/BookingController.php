<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Listing;
use Illuminate\Support\Facades\Auth;
use App\Services\MpesaService;

class BookingController extends Controller
{
    // =========================
    // SHOW USER BOOKINGS
    // =========================
    public function index()
    {
        $user = Auth::user();

        $bookings = $user->bookings()
            ->with('listing')
            ->latest()
            ->get();

        return view('bookings.index', compact('bookings'));
    }

    // =========================
    // STORE BOOKING + STK PUSH
    // =========================
    public function store(Request $request, Listing $listing)
    {
        $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
            'phone'      => 'required|min:10',
        ]);

        // FORMAT PHONE (ensure Kenya format)
        $phone = $request->phone;

        if (substr($phone, 0, 1) == '0') {
            $phone = '254' . substr($phone, 1);
        }

        if (substr($phone, 0, 1) == '+') {
            $phone = str_replace('+', '', $phone);
        }

        // CALCULATE DAYS
        $days = (
            strtotime($request->end_date) -
            strtotime($request->start_date)
        ) / 86400 + 1;

        $totalPrice = $listing->price * $days;

        // CREATE BOOKING
        $booking = Booking::create([
            'user_id'        => Auth::id(),
            'listing_id'     => $listing->id,
            'start_date'     => $request->start_date,
            'end_date'       => $request->end_date,
            'total_price'    => $totalPrice,
            'status'         => 'pending',
            'payment_status' => 'pending',
            'phone'          => $phone,
        ]);

        // =========================
        // STK PUSH REQUEST
        // =========================
        try {
            $mpesa = new MpesaService();

            $response = $mpesa->stkPush(
                $phone,
                $totalPrice,
                'GRADSTAY-' . $booking->id,
                'GRADSTAY Booking Payment'
            );

            // =========================
            // SAVE CHECKOUT REQUEST ID
            // =========================
            $booking->checkout_request_id = $response['CheckoutRequestID'] ?? null;
            $booking->save();

            return back()->with(
                'success',
                'STK Push sent successfully. Check your phone and enter PIN to complete payment.'
            );

        } catch (\Exception $e) {

            return back()->with(
                'error',
                'Payment failed: ' . $e->getMessage()
            );
        }
    }
}