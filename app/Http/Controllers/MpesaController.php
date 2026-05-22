<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MpesaService;

class MpesaController extends Controller
{
    private $mpesa;

    public function __construct(MpesaService $mpesa)
    {
        $this->mpesa = $mpesa;
    }

    public function stkPush(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'amount' => 'required|numeric',
            'reference' => 'required'
        ]);

        $phone = $request->phone;

        // CLEAN PHONE FORMAT
        if (substr($phone, 0, 1) == '0') {
            $phone = '254' . substr($phone, 1);
        }

        if (substr($phone, 0, 1) == '+') {
            $phone = str_replace('+', '', $phone);
        }

        try {

            $response = $this->mpesa->stkPush(
                $phone,
                $request->amount,
                $request->reference,
                'GRADSTAY Booking Payment'
            );

            return response()->json([
                'success' => true,
                'data' => $response
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /*
    |------------------------------------------------------------------
    | MPESA CALLBACK
    |------------------------------------------------------------------
    */

    public function callback(Request $request)
    {
        // SAVE MPESA CALLBACK RESPONSE
        \Log::info('MPESA CALLBACK:', $request->all());

        return response()->json([
            'ResultCode' => 0,
            'ResultDesc' => 'Accepted'
        ]);
    }
}