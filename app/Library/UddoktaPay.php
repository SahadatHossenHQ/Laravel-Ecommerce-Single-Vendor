<?php

namespace App\Library;

use Exception;

class UddoktaPay
{

    /**
     * Send payment request
     *
     * @param array $requestData
     * @return void
     */

    public static function init_payment($requestData)
    {

        if(setting('umode')=='2' ){
            $baseURL = 'https://'.setting('ubase');
        }else{
            $baseURL = 'https://sandbox.uddoktapay.com';
        }
        
        $curl = curl_init();

        curl_setopt_array($curl, [
             CURLOPT_URL => $baseURL."/api/checkout-v2",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($requestData),
            CURLOPT_HTTPHEADER => [
                "RT-UDDOKTAPAY-API-KEY: " . setting("uapi"),
                "accept: application/json",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new Exception("cURL Error #:" . $err);
        } else {
            $result = json_decode($response, true);
            if (isset($result['status']) && isset($result['payment_url'])) {
                return $result['payment_url'];
            } else {
                throw new Exception($result['message']);
            }
        }
        throw new Exception("Please recheck env configurations");
    }

    /**
     * Verify payment
     *
     * @param string $invoice_id
     * @return void
     */

    public static function verify_payment($invoice_id)
    {
            if(setting('umode')=='2' ){
                $baseURL = 'https://'.setting('ubase');
            }else{
                $baseURL = 'https://sandbox.uddoktapay.com';
            }

        $invoice_data = [
            'invoice_id'    => $invoice_id,
        ];

        $curl = curl_init();
        
        

        curl_setopt_array($curl, [
            CURLOPT_URL => $baseURL. "/api/verify-payment",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($invoice_data),
            CURLOPT_HTTPHEADER => [
                "RT-UDDOKTAPAY-API-KEY: " . setting("uapi"),
                "accept: application/json",
                "content-type: application/json"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            throw new Exception("cURL Error #:" . $err);
        } else {
            return json_decode($response, true);
        }
        throw new Exception("Please recheck env configurations");
    }
}