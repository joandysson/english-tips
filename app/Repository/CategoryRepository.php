<?php

namespace App\Repository;

use App\Models\Category;

class CategoryRepository
{
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function all(): array|bool
    {
        return $this->category->all();
    }
}
