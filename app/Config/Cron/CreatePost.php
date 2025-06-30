<?php

namespace App\Config\Cron;

use App\Repository\PostRepository;
use OpenAI;

class CreatePost implements CronInterface
{
    public PostRepository $postRepository;

    public function __construct() {
        $this->postRepository = new PostRepository();
    }

    public function run(): void
    {
        $data = $this->postRepository->getPostToEnrich();

        $openai = OpenAI::client(getenv('OPENAI_API_KEY'));

        $response = $openai->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => file_get_contents(__DIR__ . '/prompt_system_create_post.txt')
                ],
                [
                    'role' => 'user',
                    'content' => "Gere um artigo em HTML com o seguinte título e descrição:\n\nTítulo: {$data['title']} \n Resumo: {$data['excerpt']}."],
            ],
            'temperature' => 0.8,
        ]);

        $html = $response->choices[0]->message->content;

        $this->postRepository->update($data['id'], [
            'content' => $html,
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s')
        ]);
    }
}
