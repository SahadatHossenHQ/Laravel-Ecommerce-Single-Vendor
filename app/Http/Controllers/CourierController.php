<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        // dd($response);



        $order = Order::findOrFail($invoice);
        if ($order->status != 9) {
            $order->status = 9; // sended to courier
            DB::table('multi_order')->where('order_id', $invoice)->update(['status' => 9]);
            $order->save();
        
            notify()->success("Courerier Sended successfully", "Congratulations");
            return back();
            $this->sendNotification('Courier', $order->invoice, $order->user_id);
        }

        
        if($response['status'] != 200){
            notify()->warning($response['errors']['invoice'][0], "Something Wrong");
            return back();
        }

        // Return the API response as JSON
        // return response()->json($response);
        // dd($response);



        // All Response
            //         array:3 [▼
            // "status" => 200
            // "message" => "Consignment has been created successfully."
            // "consignment" => array:11 [▼
            //     "consignment_id" => 74261643
            //     "invoice" => "80"
            //     "tracking_code" => "46D248B1E"
            //     "recipient_name" => "Shamim Khan"
            //     "recipient_phone" => "01721600688"
            //     "recipient_address" => "h, Dhaka, Dhaka,"
            //     "cod_amount" => 0
            //     "status" => "in_review"
            //     "note" => "N/A"
            //     "created_at" => "2024-02-18T11:58:59.000000Z"
            //     "updated_at" => "2024-02-18T11:58:59.000000Z"
            // ]
            // ]
    }
}
