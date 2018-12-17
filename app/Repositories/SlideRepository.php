<?php

namespace App\Repositories;

use App\Slider;

class SlideRepository extends Repository
{
    public function __construct(Slider $slider = null) {
        $this->model = $slider;
    }
}
