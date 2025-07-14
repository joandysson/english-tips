<?php

namespace App\Config\Cron\Quiz;

use App\Config\Cron\CronInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class PostQuiz implements CronInterface
{
    private const QUIZ_POSITION_FILE = __DIR__ . '/quiz_position.json';
    private const QUIZ_PHASE_1_4_FILE = __DIR__ . '/quiz_ingles_fase1_4.json';
    private const QUIZ_PHASE_5_9_FILE = __DIR__ . '/quiz_ingles_fase5_9.json';
    private const ANIMATED_PHRASES = __DIR__ . '/fases_animadas_telegram.json';

    public function run(): void
    {
        try {
            $quizzes = $this->getQuestions();

            $quizPosition = $this->getQuizPosition();

            // Se já existe uma posição salva, incrementa a posição e envia o quiz.
            if ($quizPosition !== null) {
                $quizPosition['current_position']++;
                $quiz = $quizzes[$quizPosition['current_position']] ?? $quizzes[0];
                $this->sendQuiz($quiz);
                $this->saveQuizPosition($quizPosition);
                return;
            }

            // Se não existe posição, envia o primeiro quiz.
            $quizPosition = ['current_position' => 0];
            $this->sendQuiz($quizzes[0]);
            $this->saveQuizPosition($quizPosition);

        } catch (\Exception $e) {
            // Log de erro genérico
            echo "Erro: " . $e->getMessage();
        }
    }

    private function getQuestions(): array
    {
        $quizFase1To4 = $this->readJsonFile(self::QUIZ_PHASE_1_4_FILE);
        $quizFase5To9 = $this->readJsonFile(self::QUIZ_PHASE_5_9_FILE);

        return array_merge($quizFase1To4, $quizFase5To9);
    }

    private function getQuizPosition(): ?array
    {
        // Verifica se o arquivo de posição do quiz existe e lê
        return file_exists(self::QUIZ_POSITION_FILE) ? $this->readJsonFile(self::QUIZ_POSITION_FILE) : null;
    }

    private function readJsonFile(string $filePath): array
    {
        if (!file_exists($filePath)) {
            throw new \RuntimeException("Arquivo não encontrado: $filePath");
        }

        $jsonContent = file_get_contents($filePath);
        $data = json_decode($jsonContent, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new \RuntimeException("Erro ao decodificar JSON: " . json_last_error_msg());
        }

        return $data;
    }

    private function saveQuizPosition(array $quizPosition): void
    {
        file_put_contents(self::QUIZ_POSITION_FILE, json_encode($quizPosition));
    }

    public function sendQuiz(array $quiz): void
    {
        $phrases = json_decode(file_get_contents(self::ANIMATED_PHRASES), true);
        $key = array_rand(json_decode(file_get_contents(self::ANIMATED_PHRASES), true), 1);

        $phrase = [
            'txt' => $phrases[$key]['txt'],
            'type' => 'chat'

        ];

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json',
        ];
        $body = [
            'channel' => 'telegram',
            'data' => [
                'notifications' => [$phrase, $quiz],
                'config' => [
                    'bot_token' => getenv('TELEGRAM_BOT_TOKEN'),
                    'chat_id' => getenv('TLEGRAM_GROUP_TOKEN'),
                ],
            ],
        ];

        try {
            $response = $client->post('https://notification.toolz.at/api/v1/notify', [
                'headers' => $headers,
                'json' => $body,
            ]);
            echo $response->getBody();
        } catch (RequestException $e) {
            echo "Erro ao enviar quiz: " . $e->getMessage();
        }
    }


}
