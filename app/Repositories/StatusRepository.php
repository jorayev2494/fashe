<?php

namespace App\Repositories;

use App\Status;

class StatusRepository extends Repository
{
    public function __construct(Status $status) {
        $this->model = $status;
    }
}
