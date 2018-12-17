<?php

namespace App\Repositories;
use App\Product;

class ProductRepository extends Repository
{
    public function __construct(Product $product = null) {
        $this->model = $product;
    }

    /**
     * Добавить данный в БД-у
     *
     * @param array $data
     * @return void
     */
    // public function create(array $data)
    // {
    //     return Product::create();
    // }

}
