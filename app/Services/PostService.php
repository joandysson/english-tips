<?php

namespace App\Services;

use App\Repository\PostRepository;

class PostService
{
    private PostRepository $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function get(int $id): array|bool
    {
        return $this->postRepository->getById($id);
    }

    public function paginate(int $page, $perPage = 9): array
    {
        return array_merge(
            $this->postRepository->paginate($page, $perPage),
            ['current_page' => $page]
        );
    }

    public function getByCategory(string $category, int $limit, array $exceptIds): array
    {
        return $this->postRepository->getByCategory($category, $limit, $exceptIds);
    }

    public function increaseViews(array $data): array
    {
        return $this->postRepository->update($data['id'], [
            'views' => $data['views'] + 1
        ]);
    }
}
