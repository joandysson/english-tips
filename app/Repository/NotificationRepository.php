<?php

namespace App\Repository;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class NotificationRepository
{

    const CHANNEL = 'email';

    private Client $client;

    public function __construct(?Client $client = null)
    {
        $this->client = $client ?: new Client();
    }

    public function create(array $data): mixed
    {
        $headers = [
            'Content-Type' => 'application/json',
        ];

        $body = [
            'channel' => self::CHANNEL,
            'data' => $data,
        ];

        $baseUrl = getenv('NOTIFY_API');
        $url = rtrim((string) $baseUrl, '/') . '/api/v1/notify';
        $request = new Request('POST', $url, $headers, json_encode($body));
        $res = $this->client->sendAsync($request)->wait();
        return $res->getBody()->getContents();
    }

}
