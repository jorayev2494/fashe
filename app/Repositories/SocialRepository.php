<?php

namespace App\Repositories;

use App\Social;

class SocialRepository extends Repository
{
    public function __construct(Social $social = null) {
        $this->model = $social;
    }
}
