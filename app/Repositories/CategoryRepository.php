<?php

namespace App\Repositories;

use App\Category;

class CategoryRepository extends Repository
{
    public function __construct(Category $category = null) {
        $this->model = $category;
    }
}
