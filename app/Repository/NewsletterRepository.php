<?php

namespace App\Repository;

use App\Models\Newsletter;

class NewsletterRepository
{
    private Newsletter $newsletter;

    public function __construct()
    {
        $this->newsletter = new Newsletter();
    }

    public function getPaginate(int $lastPage, int $perPage): array|bool
    {
        return $this->newsletter->keysetPagination($lastPage, $perPage);
    }

    public function all(): array|bool
    {
        return $this->newsletter->all();
    }

    public function create(array $data): array
    {
        return $this->newsletter->create($data);
    }

    public function getByEmail(string $email, bool $deletedAt): array|bool
    {
        return $this->newsletter->getByEmail($email, $deletedAt);
    }

    public function update(int $id, array $data): array
    {
        return $this->newsletter->update($id, $data);
    }

    public function delete(string $email): int
    {
        return $this->newsletter->deleteByEmails([$email]);
    }
}
