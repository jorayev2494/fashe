<?php

namespace App\Repositories;

use App\Customer;

class CustomerRepository extends Repository
{
    public function __construct(Customer $customer = null) {
        $this->model = $customer;
    }
}
