<?php

namespace App\Config\Cron;

use App\Repository\PostRepository;
use OpenAI;

class CreatePostTitle implements CronInterface
{
    const OPENAI_API_KEY = '';

    public PostRepository $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function run(): void
    {
        $openai = OpenAI::client(getenv('OPENAI_API_KEY'));

        $response = $openai->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a JSON API that returns clean and valid JSON data only. Do not include explanations or formatting.'
                ],
                [
                    'role' => 'user',
                    'content' => file_get_contents(__DIR__ . '/prompt_user_create_post_title.txt')
                ],
            ],
            'temperature' => 0.8,
        ]);

        $json = $response->choices[0]->message->content;

        $data = json_decode($json, true);

        if (json_last_error() === JSON_ERROR_NONE) {
            echo "JSON válido:\n";
            print_r($data);

            foreach($data as $value) {
                try {
                    $data = $this->postRepository->create([
                        'title' => $value['title'],
                        'slug' => $this->gerarSlug($value['title']),
                        'category' => $value['category'],
                        'excerpt' => $value['description'],
                    ]);
                } catch (\Throwable $th) {
                    echo PHP_EOL;
                    echo $th->getMessage();
                    echo PHP_EOL;
                }
            }

        } else {
            echo "Erro ao decodificar JSON: " . json_last_error_msg() . "\n";
            echo "Resposta bruta:\n" . $json;
        }
    }


    private function gerarSlug($titulo) {
        $slug = strtolower(iconv('UTF-8', 'ASCII//TRANSLIT', $titulo));
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        return trim($slug, '-');
    }
}
