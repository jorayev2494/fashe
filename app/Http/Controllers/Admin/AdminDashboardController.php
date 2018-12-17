<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends AdminMasterController
{
    public function index() {
        $this->adn_title = "dashboard";
        return $this->outputAdminView("admin.pages.dashboard");
    }
}
