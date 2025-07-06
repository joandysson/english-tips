<?php

namespace App\Controllers;

use App\Config\Router\Router;
use App\Services\NewsletterService;
use App\Services\PostService;

class NewsletterController
{
    private PostService $postService;
    private NewsletterService $newsletterService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->newsletterService = new NewsletterService();
        session_start();
    }

    public function index(): void
    {
        view('newsletter');
    }

    public function create($data): void
    {
        if (empty($data['email']) || filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false || empty($data['name'])) {
            Router::redirectBack('/newsletter?error=1');
            exit;
        }

        $this->newsletterService->updateOrCreate($data);

        $_SESSION['newsletter_success'] = true;
        Router::redirect('/thank-you-newsletter');
    }

    public function delete($data): void
    {
        if (empty($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            Router::redirect('/');
        }

        if ($this->newsletterService->delete($data['email'])) {
            $_SESSION['unsubscribe_newsletter_success'] = true;
            Router::redirect('/unsubscribe-newsletter?email=' . $data['email']);
        }

        Router::redirect('/');
    }

    public function thankYou(): void
    {
        if ($_SESSION['newsletter_success']) {
            unset($_SESSION['newsletter_success']);
            $posts = $this->postService->paginate(page: 1, perPage: 3);
            view('thank-you-newsletter', ['data' => $posts]);
        }

        Router::redirect('/');
    }

    public function unsubscribe(): void
    {
        if (isset($_SESSION['unsubscribe_newsletter_success'])) {
            unset($_SESSION['unsubscribe_newsletter_success']);
            view('unsubscribe');
        }

        Router::redirect('/');
    }
}
