<?php

namespace App\Services;

use App\Repository\NewsletterRepository;

class NewsletterService
{
    private NewsletterRepository $newsletterRepository;

    public function __construct()
    {
        $this->newsletterRepository = new NewsletterRepository();
    }

    public function all(): array|bool
    {
        return $this->newsletterRepository->all();
    }

    public function updateOrCreate(array $data): array
    {
        $data = $this->newsletterRepository->getByEmail($data['email'], false);

        if (empty($data)) {
            return $this->newsletterRepository->create($data);
        }

        return $this->newsletterRepository->update($data['id'], [
            'name' => $data['name'],
            'email' => $data['email'],
            'deleted_at' => null,
        ]);
    }

    public function delete(string $email): int
    {
        return $this->newsletterRepository->delete($email);
    }
}
