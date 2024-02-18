<?php

namespace App\Services;

use GuzzleHttp\Client;

class SteadfastCourierService
{
    protected $baseUrl = 'https://portal.steadfast.com.bd/api/v1';
    protected $apiKey;
    protected $secretKey;

    public function __construct($apiKey, $secretKey)
    {
        $this->apiKey = $apiKey;
        $this->secretKey = $secretKey;
    }

    public function createOrder($invoice, $recipientName, $recipientPhone, $recipientAddress, $codAmount, $note = null)
    {
        $client = new Client();

        $response = $client->post($this->baseUrl . '/create_order', [
            'headers' => [
                'Api-Key' => $this->apiKey,
                'Secret-Key' => $this->secretKey,
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'invoice' => $invoice,
                'recipient_name' => $recipientName,
                'recipient_phone' => $recipientPhone,
                'recipient_address' => $recipientAddress,
                'cod_amount' => $codAmount,
                'note' => $note,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
