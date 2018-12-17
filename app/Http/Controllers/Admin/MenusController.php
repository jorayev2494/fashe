<?php

namespace App\Http\Controllers\Admin;

use App\Repositories\AdminMenuRepository;
use App\Repositories\MenuRepository;
use App\AdminMenu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\menu;
use Validator;


class MenusController extends AdminMasterController
{

    public function __construct(MenuRepository $menu) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_menu_r = $menu;
    }

    public function index()
    {
        $this->adn_title = "menus";
        $menus = $this->adn_menu_r->get();
        return $this->outputAdminView("admin.pages.menus.index", "menus", $menus);
    }

    public function create()
    {
        $this->adn_title = "create_menu";
        return $this->outputAdminView("admin.pages.menus.create");
    }

    public function store(Request $request)
    {
        $data = $request->except("_token");

        $rules = [
            "menu_title" => "required|min:2|max:20",
            "menu_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }


        $this->adn_menu_r->create([
            "name" => $data["menu_title"],
            "prefix" => $data["menu_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "menu_created");

        return redirect()->route('admin.menus.index');

    }

    public function show($id)
    {
        $this->adn_title = "info_menu";
        $menu = $this->adn_menu_r->getById($id);
        return $this->outputAdminView("admin.pages.menus.info", "menu", $menu);
    }

    public function edit($id)
    {
        $this->adn_title = "menu_edit";
        $menu = $this->adn_menu_r->getById($id);
        return $this->outputAdminView("admin.pages.menus.edit", "menu", $menu);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "method");

        // dd($data);
        $rules = [
            "menu_title" => "required|min:2|max:20",
            "menu_prefix"  => "required|alpha|min:2|max:20",
        ];

        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        $this->adn_menu_r->getById($id)->update([
            "name" => $data["menu_title"],
            "prefix" => $data["menu_prefix"],
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "menu_updated");

        return redirect()->route('admin.menus.index');
    }

    public function destroy($id)
    {
        $menu = $this->adn_menu_r->getById($id)->delete();

        $this->sessionAlert("success", "menu_deleted");
        return redirect()->route('admin.menus.index');
    }
}
