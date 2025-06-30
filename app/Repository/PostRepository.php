<?php

namespace App\Repository;

use App\Models\Post;

class PostRepository
{
    private Post $post;

    public function __construct()
    {
        $this->post = new Post();
    }

    public function getById(int $id): array|bool
    {
        return $this->post->byId($id);
    }

    public function paginate(int $page, int $perPage): array
    {
        $total = current($this->post->getTotal())['total'];

        $lastId = $total - (($page - 1) * $perPage);

        $data = [
            'data' => $this->post->keysetPagination($lastId, $perPage),
            'total' => $total,
            'pages' => (int) ceil($total / $perPage)
        ];

        return $data;
    }
    public function create(array $data): array
    {
        return $this->post->create($data);
    }

    public function getPostToEnrich(): array
    {
        return current($this->post->whereRaw('content IS NULL AND status = "draft" order by id asc limit 1'));
    }

    public function update(int $id, array $data): array
    {
        return $this->post->update($id, $data);
    }

    public function getByCategory(string $category, int $limit, array $exceptIds): array
    {
        return $this->post->getByCategory($category, $limit, $exceptIds);
    }
}
