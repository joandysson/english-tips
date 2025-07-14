<?php

namespace App\Controllers;

use App\Service\PostService;

class HomeController
{
    private PostService $postService;

    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function home(): void
    {
        $page = 1;
        $data = $this->postService->paginate($page);

        $data['data'] =  array_slice($data['data'], 0, 6);

        view('home', [
            'data' => $data
        ]);
    }
}
