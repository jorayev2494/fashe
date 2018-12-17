<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminMenuRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\StatusRepository;
use App\Http\Requests\ProductRequest;
use App\AdminMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;


class StatusesController extends AdminMasterController
{

    public function __construct(ProductRepository $products, StatusRepository $status) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_product_r = $products;
        $this->adn_status_r = $status;
    }

    public function index()
    {
        $this->adn_title = "status";
        $statuses = $this->adn_status_r->get();
        return $this->outputAdminView("admin.pages.statuses.index", "statuses", $statuses);
    }

    public function create()
    {
        $this->adn_title = "status_create";
        return $this->outputAdminView("admin.pages.statuses.create");
    }

    public function store(Request $request)
    {
        $data = $request->except("_token");

        $rules = [
            "status_title" => "required|min:2|max:20",
            "status_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $this->adn_status_r->create([
            "name" => $data["status_title"],
            "prefix" => $data["status_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "status_created");

        return redirect()->route('admin.statuses.index');

    }

    public function show($id)
    {
        $this->adn_title = "info_status";
        $status = $this->adn_status_r->getById($id);
        return $this->outputAdminView("admin.pages.statuses.info", "status", $status);
    }

    public function edit($id)
    {
        $this->adn_title = "status_edit";
        $status = $this->adn_status_r->getById($id);
        return $this->outputAdminView("admin.pages.statuses.edit", "status", $status);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "_method");

        // dd($data);
        $rules = [
            "status_title" => "required|min:2|max:20",
            "status_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $cat = $this->adn_status_r->getById($id)->update([
            "name" => $data["status_title"],
            "prefix" => $data["status_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "status_updated");

        return redirect()->route('admin.statuses.index');
    }

    public function destroy($id)
    {
        $category = $this->adn_status_r->getById($id)->delete();

        $this->sessionAlert("success", "status_deleted");
        return redirect()->route('admin.statuses.index');
    }
}
