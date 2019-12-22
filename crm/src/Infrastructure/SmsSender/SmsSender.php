<?php
declare(strict_types=1);

namespace App\Infrastructure\SmsSender;

use GuzzleHttp\Client;

class SmsSender
{
    public function sendSms(string $phoneNumber, string $message): void
    {
        $client = new Client();

        $response = $client->post(
            'nginx.sms-sender/api/',
            [
                'json' => [
                    'jsonrpc' => '2.0',
                    'method' => 'send_sms',
                    'params' => [
                        'phoneNumber' => $phoneNumber,
                        'message' => $message,
                    ]
                ],
            ]
        );
    }
}