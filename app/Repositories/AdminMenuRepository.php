<?php

namespace App\Repositories;

use App\AdminMenu;


class AdminMenuRepository extends Repository
{
    public function __construct(AdminMenu $adminMenu = null) {
        $this->model = $adminMenu;
    }
}
