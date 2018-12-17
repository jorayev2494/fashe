<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Repositories\AdminMenuRepository;
use App\AdminMenu;
use Validator;

class RolesController extends AdminMasterController
{

    public function __construct(RoleRepository $roles) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_role_r = $roles;
    }

    public function index()
    {
        $roles = $this->adn_role_r->get();
        return $this->outputAdminView("admin.pages.roles.index", "roles", $roles);
    }


    public function create()
    {
        $this->adn_title = "role_category";
        return $this->outputAdminView("admin.pages.roles.create");
    }


    public function store(Request $request)
    {
        $data = $request->except("_token");

        $rules = [
            "role_title" => "required|alpha|min:2|max:20",
            "role_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $this->adn_role_r->create([
            "title" => $data["role_title"],
            "prefix" => $data["role_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "role_created");

        return redirect()->route('admin.roles.index');
    }


    public function show($id)
    {
        $this->adn_title = "info_role";
        $role = $this->adn_role_r->getById($id);
        return $this->outputAdminView("admin.pages.roles.info", "role", $role);
    }


    public function edit($id)
    {
        $this->adn_title = "edit_role";
        $role = $this->adn_role_r->getById($id);
        return $this->outputAdminView("admin.pages.roles.edit", "role", $role);
    }


    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "_method");

        // dd($data);
        $rules = [
            "role_title" => "required|alpha|min:2|max:20",
            "role_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $role = $this->adn_role_r->getById($id)->update([
            "title" => $data["role_title"],
            "prefix" => $data["role_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "role_updated");

        return redirect()->route('admin.roles.index');
    }


    public function destroy($id)
    {
        $category = $this->adn_role_r->getById($id)->delete();

        $this->sessionAlert("success", "role_deleted");
        return redirect()->route('admin.roles.index');
    }
}
