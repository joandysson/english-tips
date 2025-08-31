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

        $result = $repo->create('sender@example.com', 'John Doe', 'Hello message');

        $this->assertSame('OK', $result);
        $this->assertCount(1, $history);

        /** @var Request $request */
        $request = $history[0]['request'];
        $this->assertSame('POST', $request->getMethod());
        $this->assertStringEndsWith('/api/v1/notify', (string) $request->getUri());
        $this->assertSame('application/json', $request->getHeaderLine('Content-Type'));

        $payload = json_decode((string) $request->getBody(), true);
        $this->assertSame('email', $payload['channel']);
        $this->assertSame('email', $payload['channel']);
        $notification = $payload['data']['notifications'][0];
        $this->assertSame('Contact: English Tips from John Doe', $notification['subject']);
        $this->assertSame('Hello message', $notification['message']);
        $this->assertSame('test@local', $notification['recipients'][0]['email']);
        $this->assertSame('Admin', $notification['recipients'][0]['name']);

        $this->assertArrayNotHasKey('config', $payload['data']);
    }
}
