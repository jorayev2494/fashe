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
use File;
use App\Repositories\MenuRepository;


class CategoriesController extends AdminMasterController
{

    private $imageFile = false;
    private $imageName = null;

    public function __construct(ProductRepository $products, CategoryRepository $categories, StatusRepository $statuses, MenuRepository $menus) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_product_r    = $products;
        $this->adn_category_r   = $categories;
        $this->adn_status_r     = $statuses;
        $this->adn_menu_r       = $menus;
    }

    public function index()
    {
        $this->adn_title = "categories";
        $categories = $this->adn_category_r->get();
        return $this->outputAdminView("admin.pages.categories.index", "categories", $categories);
    }

    public function create()
    {
        $this->adn_title = "create_category";
        $defaultImage = asset("fashe") . "/categories/default/no-image.jpg";
        $menus = $this->adn_menu_r->getActive();
        // dd($menus);
        return $this->outputAdminView("admin.pages.categories.create", ["menus", "defaultImage"], [$menus, $defaultImage]);
    }

    public function store(Request $request)
    {
        $data = $request->except("_token");

        $rules = [
            "category_title"    =>  "required|min:2|max:20",
            "category_link"     =>  "required|min:2|max:20",
            "menu_id"           =>  "required|numeric",
            "image"             =>  "dimensions:width=1920,height=239",
        ];

        $messages = [
            "image.dimensions" => "1920x239",
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }

        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $this->imageName = $image->getClientOriginalName();
            $image->move(public_path("fashe") . "/categories/" . $data["category_title"] . "/image/", $this->imageName);
        }

        // dd($data);



        $this->adn_category_r->create([
            "name" => $data["category_title"],
            "link" => $data["category_link"],
            "menu_id" => $data["menu_id"],
            "img"  => $this->imageName,
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "category_created");

        return redirect()->route('admin.categories.index');

    }

    public function show($id)
    {
        $this->adn_title = "info_category";
        $category = $this->adn_category_r->getById($id);
        return $this->outputAdminView("admin.pages.categories.info", "category", $category);
    }

    public function edit($id)
    {
        $this->adn_title = "category_edit";
        $menus = $this->adn_menu_r->getActive();
        $category = $this->adn_category_r->getById($id);
        return $this->outputAdminView("admin.pages.categories.edit", ["category", "menus"], [$category, $menus]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "method");

        // dd($data);

        $category = $this->adn_category_r->getById($id);

        $rules = [
            "category_title"    => "required|min:2|max:20",
            "category_link"     => "required|min:2|max:20",
            "menu_id"           =>  "required|numeric",
            "image"             => "dimensions:width=1920,height=239",
        ];

        $messages = [
            "image.dimensions" => "1920x239",
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($data);
        }



        if ($request->hasFile("image")) {
            $image = $request->file('image');
            $this->imageName = $image->getClientOriginalName();

            if($category->img) {
                $result = File::deleteDirectory(public_path("fashe") . "\\categories\\" . $category->name . "\\");
                $image->move(public_path("fashe") . "/categories/" . $data["category_title"] . "/image/", $this->imageName);
            } else {
                $image->move(public_path("fashe") . "/categories/" . $data["category_title"] . "/image/", $this->imageName);
            }
        } else {
            $this->imageName = $category->img;
        }

        // dd($data, $category, $this->imageName);


        $category->update([
            "name" => $data["category_title"],
            "link" => $data["category_link"],
            "menu_id" => $data["menu_id"],
            "img"  => $this->imageName,
            "active" => isset($data["active"]) ? true : false,
        ]);

        $this->sessionAlert("success", "category_updated");

        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $category = $this->adn_category_r->getById($id);

        if ($category->img) {
            $result = File::deleteDirectory(public_path("fashe") . "\\categories\\" . $category->name . "\\");
            // $user->avatar = null;
            // $user->save();
        }

        $category->delete();

        $this->sessionAlert("success", "category_deleted");
        return redirect()->route('admin.categories.index');
    }
}
