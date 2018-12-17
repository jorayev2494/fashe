<?php

namespace App\Repositories;

use App\Order;

class OrderRepository extends Repository
{
    public function __construct(Order $order = null) {
        $this->model = $order;
    }
}
