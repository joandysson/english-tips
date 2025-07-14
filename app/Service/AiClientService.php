<?php

namespace App\Service;

use Exception;
use GuzzleHttp\Client;
use OpenAI;

class AiClientService
{
    const DEEPSEEK = 'deepseek';
    const OPENAI = 'openai';

    public static function generateNewsletterContent(string $systemPrompt, string  $userPrompt): string
    {
        $provider = getenv('AI_PROVIDER'); // 'openai' ou 'deepseek'

        return match($provider) {
            self::DEEPSEEK => self::callDeepSeek($systemPrompt, $userPrompt),
            self::OPENAI => self::callOpenAI($systemPrompt, $userPrompt),
            default => throw new Exception('API PROVIDER NOT FOUND')
        };
    }

    private static function callOpenAI(string $systemPrompt, string $userPrompt): string
    {
        $openai = OpenAI::client(getenv('OPENAI_API_KEY'));

        $response = $openai->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $userPrompt],
            ],
            'temperature' => 0.8,
        ]);

        return $response->choices[0]->message->content;
    }

    private static function callDeepSeek(string $systemPrompt, string $userPrompt): string
    {
        $client = new Client();

        $response = $client->post('https://api.deepseek.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer ' . getenv('DEEPSEEK_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'deepseek-chat', // ou o modelo que estiver usando
                'messages' => [
                    ['role' => 'system', 'content' => $systemPrompt],
                    ['role' => 'user', 'content' => $userPrompt],
                ],
                'temperature' => 0.8,
            ]
        ]);

        $data = json_decode($response->getBody()->getContents(), true);
        return $data['choices'][0]['message']['content'] ?? '';
    }
}
