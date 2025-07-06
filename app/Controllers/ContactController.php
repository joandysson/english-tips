<?php

namespace App\Controllers;

use App\Config\Router\Router;
use App\Services\ContactService;
use App\Services\NotificationService;
use App\Services\PostService;

class ContactController
{
    private ContactService $contactService;
    private PostService $postService;
    private NotificationService $notificationService;

    public function __construct()
    {
        $this->contactService = new ContactService();
        $this->postService = new PostService();
        $this->notificationService = new NotificationService();
        session_start();
    }

    public function index(): void
    {
        view('contact');
    }

    public function store(array $request): void
    {
        if (empty($request['name']) || empty($request['email']) || empty($request['comment'])) {
            Router::redirectBack('/contact?error=1');
            exit;
        }

        $request['comment'] = $request['category'] . ' - ' . $request['comment'];
        $this->contactService->create($request);
        $this->notificationService->create(
            $request['email'],
            $request['name'],
            "email: {$request['email']} <br> comment: {$request['comment']}"
        );

        $_SESSION['contact_success'] = true;
        Router::redirect('/thank-you-contact');
    }

    public function thankYou(): void
    {
        if ($_SESSION['contact_success']) {
            unset($_SESSION['contact_success']);
            $posts = $this->postService->paginate(page: 1, perPage: 2);
            view('thank-you-contact', ['data' => $posts]);
        }

        Router::redirect('/');
    }
}
