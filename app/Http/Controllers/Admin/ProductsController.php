<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Repositories\AdminMenuRepository;
use App\Repositories\ProductRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\StatusRepository;
use App\Http\Requests\ProductRequest;
use Illuminate\Validation\Rule;
use App\AdminMenu;
use App\Product;
use Validator;



use Session;

class ProductsController extends AdminMasterController
{

    private $photoNames = array();
    private $photoFile = array();
    private const IS_ACTIVE = FALSE;

    public function __construct(ProductRepository $products, CategoryRepository $categories, StatusRepository $statuses) {
        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_product_r = $products;
        $this->adn_category_r = $categories;
        $this->adn_status_r = $statuses;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->adn_title = "products";
        $products = $this->adn_product_r->get("*"); // ->get("*", 10);
        $categories = $this->adn_category_r->get();
        $statuses = $this->adn_status_r->get();
        return $this->outputAdminView("admin.pages.products.index", ["products", "categories", "statuses"], [$products, $categories, $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Session::flush();
        $statuses = \App\Status::where("active", true)->get();
        $categories = \App\Category::where("active", true)->get();
        // $prod = \App\Status::find(1)->products;
        // $prod = \App\Product::find(47)->status;
        $this->adn_title = "adding_product";
        return $this->outputAdminView("admin.pages.products.create", ["categories", "statuses"], [$categories, $statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $array = array();

        $data = $request->except("_token");

        if ($request->hasFile("file")) {

            // $data = $request->except("_token");

            $validator = Validator::make($data, ["file" => "dimensions:width=720,height=960"]);

            if ($validator->fails()) {
                return withErrors($validator)->withInput($data);
            }

            $this->photoFile = $request->file("file");
            $this->photoNames = str_random(5) . $this->photoFile->getClientOriginalName();
            $this->photoFile->move(public_path('fashe/products'), $this->photoNames);
            // $imageName = uniqid() . $imageFile->getClientOriginalName();
            Session::push("photo_products", $this->photoNames);

        } else {

            $array = array();
            $arrSession = Session::pull("photo_products");

            if ($arrSession) {
                foreach($arrSession as $key => $arr) {
                    $array = array_add($array, "img_" . $key, $arr);
                }
            }

            $rules = [
                "product_name"          =>  "required|min:2|max:100",       // |unique:products,name",
                // "product_photo"         =>  "required",
                "product_size"          =>  "required|string|max:200",
                "product_category"      =>  "required|integer",
                "product_count"         =>  "required|integer",
                "product_color"         =>  "required|string|max:255",
                "product_status"        =>  "integer",
                "product_price"         =>  "required|numeric",
                // "product_discount"      =>  "numeric",
                "product_description"   =>  "required|min:5|max:255",
                // "active"                =>  "boolean",
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($data);
            }

            // Получить размеры в виде Json
            $tagSizes = $this->strToJson("size", ",", $data["product_size"]);

            // Получить Цветы в виде Json
            $tagColors = $this->strToJson("color", ",", $data["product_color"]);

            // dd($tagSizes, $tagColors);

            $product = $this->adn_product_r->create([
                "name"          =>  $data["product_name"],
                "category_id"   =>  $data["product_category"],
                "img"           =>  json_encode($array),
                "size"          =>  isset($tagSizes) ? $tagSizes : null,
                "count"         =>  $data["product_count"],
                "color"         =>  isset($tagColors) ? $tagColors : null,
                "price"         =>  $data["product_price"],
                "discount"      =>  $data["product_discount"],
                "status_id"     =>  isset($data["product_status"]) ? $data["product_status"] : null,
                "description"   =>  $data["product_description"],
                "active"        =>  isset($data["active"]) ? true : false,
            ]);

            $product->categories()->attach([
                $data["product_category"]
            ]);



            $this->sessionAlert("success", "product_store");
            return redirect()->route('admin.products.index');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->adn_title = "product_info";
        $product = $this->adn_product_r->getStrictlyById($id);

        $sizesTag = $this->jsonToStr(", ", $product->size);
        $colorsTag = $this->jsonToStr(", ", $product->color);

        return $this->outputAdminView("admin.pages.products.info", ["product", "sizesTag", "colorsTag"], [$product, $sizesTag, $colorsTag]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->adn_product_r->getStrictlyById($id);
        $this->adn_title = "product_info";
        $statuses = \App\Status::where("active", true)->get();
        $categories = \App\Category::where("active", true)->get();

        $sizesTag = $this->jsonToStr(", ", $product->size);
        $colorsTag = $this->jsonToStr(", ", $product->color);

        return $this->outputAdminView("admin.pages.products.edit", ["product", "statuses", "categories", "sizesTag", "colorsTag"], [$product, $statuses, $categories, $sizesTag, $colorsTag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $array = array();

        if ($request->hasFile("file")) {

            $this->photoFile = $request->file("file");
            $this->photoNames = str_random(5) . $this->photoFile->getClientOriginalName();
            $this->photoFile->move(public_path('fashe/products'), $this->photoNames);
            Session::push("photo_products", $this->photoNames);

        } else {

            $product = $this->adn_product_r->getStrictlyById($id);

            $arrSession = Session::pull("photo_products");

            // dd($arrSession);

            if ($arrSession) {
                foreach($arrSession as $key => $arr) {
                    $array = array_add($array, "img_" . $key, $arr);
                }
                $product->deletePhotos();
            }
            // else {
            //     $array = $product->img;
            // }


            // dd($array);

            $data = $request->except("_token");

            // $arrSession = Session::pull("photo_products");

            // dd($array);

            $rules = [
                "product_name"          =>  ["required", "min:2", "max:100",
                                                // Rule::unique('products')->ignore($product->id),
                                            ],
                "product_size"          =>  "required",
                "product_category"      =>  "required|integer",
                "product_count"         =>  "required|integer",
                "product_color"         =>  "required|string|max:255",
                "product_status"        =>  "integer",
                "product_price"         =>  "required|numeric",
                // "product_discount"      =>  "numeric",
                "product_description"   =>  "required|min:5|max:255",
                // "active"                =>  "boolean",
            ];

            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($data);
            }

            // dd($data);

            // Получить размеры в виде Json
            $upTagSizes = $this->strToJson("size", ",", $data["product_size"]);

            // Получить Цветы в виде Json
            $upTagColors = $this->strToJson("color", ",", $data["product_color"]);


            $product->update([
                "name"          =>  $data["product_name"],
                "category_id"   =>  $data["product_category"],
                "img"           =>  count($array) ? json_encode($array) : $product->img,
                "size"          =>  isset($upTagSizes) ? $upTagSizes : null,
                "count"         =>  $data["product_count"],
                "color"         =>  isset($upTagColors) ? $upTagColors : null,
                "price"         =>  $data["product_price"],
                "discount"      =>  $data["product_discount"],
                "status_id"     =>  $data["product_status"],
                "description"   =>  $data["product_description"],
                "active"        =>  isset($data["active"]) ? true : false,
            ]);

            $product->categories()->sync([
                $data["product_category"]
            ]);

            $this->sessionAlert("success", "product_store");
            return redirect()->route('admin.products.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->adn_product_r->getStrictlyById($id);

        $deletePhoto = $product->deletePhotos();

        $product->delete();

        $this->sessionAlert("success", "product_deleted");
        return redirect()->route('admin.products.index');
    }
}
