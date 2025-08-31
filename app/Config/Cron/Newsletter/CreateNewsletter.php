<?php

namespace App\Config\Cron\Newsletter;

use App\Config\Cron\CronInterface;
use App\Repository\NewsletterRepository;
use App\Service\AiClientService;
use Generator;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class CreateNewsletter implements CronInterface
{
    public NewsletterRepository $newsletterRepository;

    public function __construct()
    {
        $this->newsletterRepository = new NewsletterRepository();
    }

    const NEWSLETTER_POSITION_FILE = __DIR__ . '/newsletter_position_file.json';
    const THEMES_FILE = __DIR__ . '/themes.json';

    public function run(): void
    {
        $theme = $this->getTheme();

        foreach ($this->getEmails() as $emails) {
            foreach ($emails as $email) {

                $result = AiClientService::generateNewsletterContent(
                    file_get_contents(__DIR__ . '/newsletter_system_prompt.txt'),
                    str_replace('[THEME]', $theme, file_get_contents(__DIR__ . '/newsletter_user_prompt.txt'))
                );

                var_dump($result);

                $data = json_decode($result, true);

                var_dump($data);

                $data['year'] = date('Y');
                $data['unsubscribe_url'] = getenv('APP_URL') . '/unsubscribe?email=' . $email['email'];
                $data['site_url'] = getenv('APP_URL');
                $data['blog_url'] = getenv('APP_URL') . '/blog';
                $data['telegram_url'] = getenv('TLEGRAM_COMMUNITY');

                $body = emailView('newsletter', $data);

                self::sendEmail($email['email'], $email['name'], $data['title'], $body);
            }
        }
    }

    private function getEmails(): Generator
    {
        $lastPage = 0;

        $loop = true;

        while ($loop) {
            $data = $this->newsletterRepository->getPaginate(lastPage: $lastPage, perPage: 1);
            if (empty($data)) {
                break;
            }

            $ids = array_column($data, 'id');
            $maxId = max($ids);
            yield $data;
            $lastPage = $maxId + 1;
        }
    }

    private static function sendEmail(string $email, string $name, string $title, string $body)
    {

        $client = new Client();
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $body = [
            'channel' => 'email',
            'data' => [
                'notifications' => [
                    [
                        'subject' => $title,
                        'recipients' => [
                            [
                                'email' => $email,
                                'name' => $name
                            ]
                        ],
                        'unsubscribe_newsletter' => getenv('APP_URL') . '/unsubscribe?email=' . $email,
                        'alt_message' => '',
                        'message' => $body
                    ]
                ],
                'config' => [
                    'name' => getenv('EMAIL_NAME') ?: 'English Tips',
                    'username' => getenv('EMAIL_USERNAME'),
                    'password' => getenv('EMAIL_PASSWORD')
                ]
            ]
        ];

        $baseUrl = getenv('NOTIFY_API') ?: '';
        $baseUrl = trim($baseUrl, " \t\n\r\0\x0B'\"");
        if (empty($baseUrl) || !filter_var($baseUrl, FILTER_VALIDATE_URL)) {
            $baseUrl = 'https://notification.toolz.at';
        }
        $url = rtrim($baseUrl, '/') . '/api/v1/notify';
        $request = new Request('POST', $url, $headers, json_encode($body));
        $res = $client->sendAsync($request)->wait();
        echo $res->getBody();
    }

    private function getNewsLetterPosition(): ?array
    {
        // Verifica se o arquivo de posição do newsletter existe e lê
        return file_exists(self::NEWSLETTER_POSITION_FILE) ? $this->readJsonFile(self::NEWSLETTER_POSITION_FILE) : null;
    }

    private function saveNewsLetterPosition(array $newsletterPosition): void
    {
        file_put_contents(self::NEWSLETTER_POSITION_FILE, json_encode($newsletterPosition));
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

    private function getThemes(): array
    {
        $quizFase1To4 = $this->readJsonFile(self::THEMES_FILE);

        return array_merge($quizFase1To4);
    }

    public function getTheme(): string
    {
        $quizzes = $this->getThemes();

        $newsLetterPosition = $this->getNewsLetterPosition();

        // Se já existe uma posição salva, incrementa a posição e envia o quiz.
        if ($newsLetterPosition !== null) {
            $newsLetterPosition['current_position']++;
            $quiz = $quizzes[$newsLetterPosition['current_position']] ?? $quizzes[0];

            $this->saveNewsLetterPosition($newsLetterPosition);
            return $quiz;
        }

        // Se não existe posição, envia o primeiro quiz.
        $newsLetterPosition = ['current_position' => 0];
        $this->saveNewsLetterPosition($newsLetterPosition);

        return $quizzes[0];
    }
}
