<?php

namespace App\Repositories;

use App\Role;

class RoleRepository extends Repository
{
    public function __construct(Role $role = null) {
        $this->model = $role;
    }
}
