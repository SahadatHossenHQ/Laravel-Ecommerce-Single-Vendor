<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SteadfastCourierService;

class CourierController extends Controller
{
    public function sendsteedfast(Request $request)
    {
        // Instantiate SteadfastCourierService with your API key and secret key
        $steadfastService = new SteadfastCourierService(setting('STEEDFAST_API_KEY'), setting('STEEDFAST_API_SECRET_KEY'));

        // Validate request parameters as needed
        $request->validate([
            'invoice' => 'required|string',
            'recipient_name' => 'required|string',
            'recipient_phone' => 'required|string|digits:11',
            'recipient_address' => 'required|string|max:250',
            'cod_amount' => 'required|numeric|min:0',
            'note' => 'nullable|string',
        ]);

        $invoice = ltrim(preg_replace('/[^0-9]/', '', $request->input('invoice')), 0);
        $recipientName = $request->input('recipient_name');
        $recipientPhone = $request->input('recipient_phone');
        $recipientAddress = $request->input('recipient_address');
        $codAmount = $request->input('cod_amount');
        $note = $request->input('note');
        // dd($invoice);


        // Create order using Steadfast Courier API
        $response = $steadfastService->createOrder(
            $invoice,
            $recipientName,
            $recipientPhone,
            $recipientAddress,
            $codAmount,
            $note
        );

        // Return the API response as JSON
        // return response()->json($response);
        dd($response);
    }
}
