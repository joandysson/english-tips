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
            'model' => 'gpt-4o',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => file_get_contents(__DIR__ . '/prompt_system_create_post.txt')
                ],
                [
                    'role' => 'user',
                    'content' => "Create a aticle with the {$data['title']} and use this description as basis Description: {$data['excerpt']}. the title and description are not part of the article, only use sub titles. so do not start with the title or description."
                ]
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
