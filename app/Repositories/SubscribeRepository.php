<?php

namespace App\Repositories;

use App\Subscribe;

class SubscribeRepository extends Repository
{
    public function __construct(Subscribe $subscribe = null) {
        $this->model = $subscribe;
    }
}
