<?php

namespace App\Repository;

use App\Models\Newsletter;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NotificationRepository
{

    const CHANNEL = 'email';

    public function __construct()
    {

    }

    public function create(string $email, string $user, string $message): mixed
    {
        $client = new Client();

        $body = [
            'channel' => self::CHANNEL,
            'data' => [
                'sender' => 'English Tips',
                'from' => $email,
                'to' => 'contact@toolz.at',
                'subject' => $user,
                'message' => $message
            ]
        ];

        $request = new Request('POST', getenv('API_NOTIFICATION') . '/api/v1/notify', [], json_encode($body));
        $res = $client->sendAsync($request)->wait();
        return $res->getBody()->getContents();
    }

}
