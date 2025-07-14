<?php

namespace App\Service;

use App\Repository\CategoryRepository;

class CategoryService
{
    private CategoryRepository $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function all(): array|bool
    {
        return $this->categoryRepository->all();
    }
}
