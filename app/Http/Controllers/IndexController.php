<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\MenuRepository;
use App\Product;
use Config;
use Session;
use Validator;

use App\Repositories\SubscribeRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\SocialRepository;
use App\Repositories\StatusRepository;
use App\Repositories\SlideRepository;
use App\Mail\ContactMail;

use Mail;


class IndexController extends MasterController
{

    public function __construct(SlideRepository $sliders, ProductRepository $products, StatusRepository $statuses, CategoryRepository $categories, SubscribeRepository $subscribes)
    {
        parent::__construct(new SocialRepository(new \App\Social), new MenuRepository(new \App\Menu));
        $this->slider_r = $sliders;
        $this->product_r = $products;
        $this->status_r = $statuses;
        $this->category_r = $categories;
        $this->subscribe_r = $subscribes;

    }

    /**
     * Индексная страница нашего сайта
     *
     * @param Faker $faker
     * @return void
     */
    public function index()
    {


        // $test = session()->get("_token");

        // dd($test);


        $this->title = "home";

        $sliders = $this->slider_r->getActive();

        $features   = $this->product_r->getSortBy("*", "id", Config::get("settings.count_product_by_category_best_seller"));
        $sales      = $this->status_r->getByStatus("sale", Config::get("settings.count_product_by_category_sales"));

        return $this->outputView("index", ["sliders", "features", "sales"], [$sliders, $features, $sales]);
    }

    /**
     * Получить Продукты по Категории если у казан Категория
     *
     * @param [type] $link
     * @return void
     */
    public function products(Request $request, $link = null)
    {

        $data = $request->except("_token");
        $paginate = true;

        $category = false;

        // Получит Активных Категории из Бд-х
        $categories = $this->category_r->getActive();

        // Если определено категория
        if ($link != false && $request->url() == $request->is("category/*")) {
            // Получить Категории товаров
            // dd($link);
            $category = $this->category_r->getByWhere("link", $link);
            // Title Category
            $this->title = $category->link;

            // Цены Товаров
            if ($request->has("min_selected") && $request->has("max_selected")) {
                // Выбранный цена Пользователя
                $selected_price = $this->selectedPrice($data["min_selected"], $data["max_selected"]);
                // Получить выбранный товары по цене
                $productsAndPrice = $selected_products = $this->product_r->getSelectedProd("*", "price", $data["min_selected"], $data["max_selected"]);     // paginate: 6
            } else {
                // dd($this->product_r);
                // Получить Продукты с Ценами
                $productsAndPrice = $this->product_r->getByCategProd($category, "price", Config::get("settings.count_paginate_page_show_products"));
                // Получить Цены выбранных Продуктов
                $selected_price = $this->selectedPrice($productsAndPrice["price_products"]["min_price"], $productsAndPrice["price_products"]["max_price"]);
            }

        } else {

            // Title Category
            $this->title = "products";
            // Цены Товаров
            if ($request->has("min_selected") && $request->has("max_selected")) {
                // Выбранный цена Пользователя
                $selected_price = $this->selectedPrice($data["min_selected"], $data["max_selected"]);
                // Получить выбранный товары по цене
                $productsAndPrice = $selected_products = $this->product_r->getSelectedProd("*", "price", $data["min_selected"], $data["max_selected"]);     // paginate: 6
            } else {
                // Получить Продукты с Ценами
                $productsAndPrice = $this->product_r->getProdByPrice("*", "id", null, Config::get("settings.count_paginate_page_show_products"));
                // Получить Цены выбранных Продуктов
                $selected_price = $this->selectedPrice($productsAndPrice["price_products"]["min_price"], $productsAndPrice["price_products"]["max_price"]);
            }
        }

        // Вывод в интерфейс к Пользователю
        return $this->outputView("products", ["category", "products", "categories", "paginate", "selected_price", "price_products"], [$category, $productsAndPrice["products"], $categories, $paginate, $selected_price, $productsAndPrice["price_products"]]);

    }

    /**
     * Показать товар
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $this->title = "product_detail";
        $product = $this->product_r->getById($id);

        if ($product) {
            $category = $this->category_r->getById($product->categories[0]->id);
            $menu = $category->menu;
            $category_products = $category->products;

            $sizes = $this->jsonToStr(" ", $product->size, true);
            $colors = $this->jsonToStr(" ", $product->color, true);

            return $this->outputView("product_detail", ["product", "category_products", "menu", "category", "sizes", "colors"], [$product, $category_products, $menu, $category, $sizes, $colors]);
        }

        abort_if(!$product, 404);
    }

    public function search(Request $request)
    {

        $paginate = false;
        $category = false;
        $this->title = "search";
        // Получит Активных Категории из Бд-х
        $categories = $this->category_r->getActive();

        $data = $request->all();

        // Найденный продукты
        $searchedProducts = $this->product_r->search($data["search-product"]);
        // dd($searchedProducts);

        return $this->outputView("products", ["category", "products", "searched", "categories", "paginate"], [$category, $searchedProducts["products"],  $searchedProducts, $categories, $paginate]);
    }

    public function about()
    {
        return $this->outputView("about");
    }

    public function contact(Request $request)
    {

        if ($request->isMethod("POST")) {
            $data = $request->except("_token");

            $validator = Validator::make($data, [
                "name" => "required|min:2|max:50",
                "phone_number"  => "required|numeric|min:6",
                "email"   => "required|email",
                "message"   => "required|min:8",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $sendMail = Mail::to(env("ADMIN_EMAIL"))->send(new ContactMail($data));

        }

        return $this->outputView("contact");
    }


    /**
     * Подписаться
     *
     * @param Request $request
     * @return void
     */
    public function subscribe(Request $request)
    {

        $data = $request->except("_token");

        $validator = Validator::make($data, [
            "email" => "required|email",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $this->subscribe_r->create([
            "email" => $data["email"],
        ]);

        return redirect()->back()->with("success", "Вы успешно подписаны на наш новости СПАСИБО!");
    }


}
