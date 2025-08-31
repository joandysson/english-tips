<?php

namespace App\Controllers;

use App\Config\Router\Router;
use App\Service\ContactService;
use App\Service\PostService;

class ContactController
{
    private ContactService $contactService;
    private PostService $postService;
    

    public function __construct()
    {
        $this->contactService = new ContactService();
        $this->postService = new PostService();
        
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
        $created = $this->contactService->create($request);

        if (!$created || empty($created)) {
            Router::redirectBack('/contact?error=1');
            exit;
        }

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
