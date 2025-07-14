<?php

namespace App\Controllers;

use App\Service\PostService;
use App\Service\CategoryService;

class PostController
{
    private PostService $postService;
    private CategoryService $categoryService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->categoryService = new CategoryService();
    }

    public function blog(array $data): void
    {
        $page = $data['page'] ?? 1;

        if ($page < 1) {
            http_response_code(404);
            view('404');
            return;
        }

        $page = $data['page'] ?? 1;
        $posts = $this->postService->paginate($page);

        if (!$posts['data']) {
            http_response_code(404);
            view('404');
            return;
        }

        $categories = $this->categoryService->all();

        view('blog', ['data' => $posts, 'categories' => $categories]);
    }

    public function read(array $data): void
    {
        if (!isset($data['id']) || !isset($data['slug'])) {
            http_response_code(404);
            view('404');
            return;
        }

        $post = $this->postService->get($data['id']);

        if (!$data || $post['slug'] !== $data['slug']) {
            http_response_code(404);
            view('404');
            return;
        }

        $limit = 2;
        $postsByCategory = $this->postService->getByCategory($post['category_id'], $limit, [$data['id']]);
        $nextPost = $this->postService->get($data['id'] + 1);
        if ($nextPost['status'] === 'draft') {
            $nextPost = [];
        }
        $this->postService->increaseViews($post);

        view('blog-read', ['data' => ['post' => $post, 'postsByCategory' => $postsByCategory, 'nextPost' => $nextPost]]);
    }
}
