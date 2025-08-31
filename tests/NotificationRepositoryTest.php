<?php

use App\Repository\NotificationRepository;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class NotificationRepositoryTest extends TestCase
{
    public function testCreateSendsProperPayloadAndReturnsBody(): void
    {
        putenv('NOTIFY_API=https://example.test');
        putenv('NOTIFY_RECIPIENT_EMAIL=test@local');
        putenv('NOTIFY_RECIPIENT_NAME=Admin');
        putenv('EMAIL_NAME=English Tips');
        putenv('EMAIL_USERNAME=user');
        putenv('EMAIL_PASSWORD=pass');

        $history = [];
        $historyMiddleware = Middleware::history($history);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], 'OK'),
        ]);
        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($historyMiddleware);

        $client = new Client(['handler' => $handlerStack]);
        $repo = new NotificationRepository($client);

        $data = [
            'notifications' => [
                [
                    'subject' => 'Contact: English Tips from John Doe',
                    'recipients' => [
                        [
                            'email' => 'test@local',
                            'name' => 'Admin',
                        ]
                    ],
                    'alt_message' => '',
                    'message' => 'Hello message',
                ]
            ],
            'config' => [
                'name' => 'English Tips',
                'username' => 'user',
                'password' => 'pass',
            ]
        ];

        $result = $repo->create($data);

        $this->assertSame('OK', $result);
        $this->assertCount(1, $history);

        /** @var Request $request */
        $request = $history[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertStringEndsWith('/api/v1/notify', (string) $request->getUri());
        $this->assertSame('application/json', $request->getHeaderLine('Content-Type'));

        $payload = json_decode((string) $request->getBody(), true);
        $this->assertSame('email', $payload['channel']);
        $this->assertSame($data, $payload['data']);
    }
}
