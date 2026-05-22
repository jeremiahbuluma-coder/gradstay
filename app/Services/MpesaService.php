<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class MpesaService
{
    // =========================
    // GET ACCESS TOKEN
    // =========================
    public function getAccessToken()
    {
        $consumerKey = env('MPESA_CONSUMER_KEY');
        $consumerSecret = env('MPESA_CONSUMER_SECRET');

        $credentials = base64_encode($consumerKey . ':' . $consumerSecret);

        $response = Http::withHeaders([
            'Authorization' => 'Basic ' . $credentials
        ])->get(
            'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials'
        );

        $data = $response->json();

        if (!isset($data['access_token'])) {
            throw new \Exception('Unable to generate access token');
        }

        return $data['access_token'];
    }

    // =========================
    // INITIATE STK PUSH
    // =========================
    public function stkPush($phone, $amount, $reference, $description = 'Payment')
    {
        $token = $this->getAccessToken();

        $timestamp = date('YmdHis');

        $password = base64_encode(
            env('MPESA_SHORTCODE') .
            env('MPESA_PASSKEY') .
            $timestamp
        );

        $payload = [
            "BusinessShortCode" => env('MPESA_SHORTCODE'),
            "Password" => $password,
            "Timestamp" => $timestamp,
            "TransactionType" => "CustomerPayBillOnline",
            "Amount" => (int) $amount,
            "PartyA" => $phone,
            "PartyB" => env('MPESA_SHORTCODE'),
            "PhoneNumber" => $phone,
            "CallBackURL" => env('MPESA_CALLBACK_URL'),
            "AccountReference" => $reference,
            "TransactionDesc" => $description
        ];

        $response = Http::withToken($token)->post(
            'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest',
            $payload
        );

        $result = $response->json();

        // =========================
        // IMPORTANT ERROR CHECK
        // =========================
        if (!isset($result['ResponseCode']) || $result['ResponseCode'] != "0") {
            throw new \Exception(
                $result['errorMessage'] ?? 'STK Push failed'
            );
        }

        return $result;
    }
}