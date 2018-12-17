<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;
use Session;
use App\Product;
use App\Repositories\SocialRepository;
use App\Repositories\MenuRepository;
use Validator;
use Auth;
use App\Repositories\OrderRepository;
use App\Repositories\CustomerRepository;

class CartController extends MasterController
{

    public function __construct(ProductRepository $products, OrderRepository $orders, CustomerRepository $customers) {
        $this->product_r = $products;
        $this->order_r = $orders;
        $this->customer_r = $customers;
    }

    public function index()
    {
        echo __METHOD__;
    }

    /**
     * Автоматический получение цену из Сессии
     *
     * @return void
     */
    public function auto_price()
    {

        $bool = Session::get("cart");

        if (count($bool)) {
            $this->cart = array_add($this->cart, "products", Session::get("cart.products"));

            $cartCounts = Session::get('cart.count');
            $cartSums = Session::get('cart.sum');

            $cartCounts = ($cartCounts) ? $cartCounts : 0;
            $cartSums   = ($cartSums)   ? $cartSums   : 0;

            return response()->json(["cart" => $this->cart, "count" => $cartCounts, "summa" =>  $cartSums], 200);

        }

        $cartCounts = 0;
        $cartSums = 0;


        // return response()->json(["count" => $cartCounts, "summa" =>  $cartSums], 200);
    }

    /**
     * Добавить товар в Корзину
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function add(Request $request) {

        if ($request->ajax()) {                                     // Проверка запроса

            $getProduct = $this->product_r->getById($request->id_prod);

            $getProduct ? true : abort("404");

            $data = [                                               // загртоака добавление данные
                'count' => (int)$request->count_prod,                // полученные кол-во
                'price' => $request->price_prod,                     // полученные цена товара
                'summa' => (int)$request->count_prod * $request->price_prod,  // Умножение цены на кол-во купленного товара
            ];

            $cart = Session::get('cart.products');                           // Получить Корзину из Сесси
                                                    // Проверяем есть ли у нас Корзина
            if (!$request->session()->has('cart')) {                // Если false то создаем Корзину
                Session::put('cart.products.' . $request->id_prod, $data);    // Создаем Корзину и ставим наш первый товар
            } else {                                // то тогда добоаляем товар в Корзину
                $hasItem = array_has($cart, (int)$request->id_prod);
                if ($hasItem) {      // Проверяем ест ли такой товар в крозине
                    $count = 0;
                    // $count = Session::get("cart.products." . (int)$request->id_prod . ".count");
                    Session::put("cart.products." . (int)$request->id_prod . ".count", $count + (int)$request->count_prod); // Если есть (true) то поменяем количеству
                    Session::put("cart.products." . (int)$request->id_prod . ".price", $request->price_prod); // Если есть (true) то умножим цену на новую

                    $count = Session::get("cart.products." . (int)$request->id_prod . ".count");
                    $price = Session::get("cart.products." . (int)$request->id_prod . ".price");
                    Session::put("cart.products." . (int)$request->id_prod . ".summa", $count * $price);      // Если есть (true) то умножим Сумму товара и сохраняем в Сесси
                } else {
                    Session::put('cart.products.' . (int)$request->id_prod, $data);    // Если нет (false) тогда добавляем новый товар в корзину
                }
            }

            // Посчитать Количеству товара
            $hasCount = Session::has('cart.count');
            if ($hasCount) {                    // Получить кло-ву товароа из Корзины

                $count = 0;
                $cartProducts = Session::get("cart.products");

                foreach($cartProducts as $product) {
                    $count += $product["count"];
                }

                Session::put('cart.count', $count);
            } else {
                Session::put('cart.count', $request->count_prod);            // Если нет товаров в Корзине то создаем и встовляем наш товар в Корзину
            }

            // Посчитать Сумму товара
            $hasSum = Session::has('cart.sum');
            if ($hasSum) {                      // проверяем есть ли такой товар и такой цена в Корзине

                $sum = 0;
                $sumProducts = Session::get("cart.products");

                foreach($sumProducts as $product) {
                    $sum += $product["summa"];
                }

                Session::put('cart.sum', $sum);
            } else {
                Session::put('cart.sum', $request->count_prod * $request->price_prod);    // (false) то тогда просто умножим и вставим на наш Сессию сумму Корзины
            }

            $cartCounts = Session::get('cart.count');
            $cartSums   = Session::get('cart.sum');

            $thisData = [
                "thisCount" => $thisCount = Session::get('cart.products.' . $request->id_prod . ".count"),
                "thisSumma" => $thisSumma = Session::get('cart.products.' . $request->id_prod . ".summa"),
            ];

            return response()->json([$cartCounts, $cartSums, $getProduct, "thisData" => $thisData], 200);         // Отпраавим ответ к View пользователью
        }
    }

    /**
     * Показать товары в корзине
     *
     * @return void
     */
    public function show_header()
    {
        $has = Session::has('cart');                    // Проверяем есть ли в Сесси наш Корзина
        $itemCart = Session::get('cart');               // Получаем нашу Корзину из Сесси

        if ($has) {
            // $data = array_except($itemCart, ['sum', 'count']);      // (true) то тогда исключаем наш общий Сумму и общию Кол-ву из наш массива
            $cartProducts = Session::get('cart.products');      // (true) то тогда исключаем наш общий Сумму и общию Кол-ву из наш массива

            $num = 0;

            foreach($cartProducts as $id => $products) {                       // И получаем каждую по отделбносьтю


                $product = Product::where('active', true)->find($id);         // Получить товар по ID из БД-х через Репозитории

                $arr = [                                // Ставить в корзину о информации товара
                    "product_info"  => $product,                               // Получаем Модель товарв
                    "img"   => $product->getImage(),                            // Получить Изображение Товара
                    "id"    => $product->id,
                    "count" => $products['count'],                              // Получить Количество заказынного товара
                    "price" => $products['price'],                              // Получить Цену заказынного товара
                    "summa" => $products['summa'],                              // Получить Сумму заказынного товара
                ];

                $this->cart = array_add($this->cart, $num++, $arr);
            }
        }

        $cartCounts = Session::get('cart.count');
        $cartSums = Session::get('cart.sum');

        $cartCounts = ($cartCounts) ? $cartCounts : 0;
        $cartSums   = ($cartSums) ? $cartSums : 0;

        return response()->json(["products" => $this->cart, "count" => $cartCounts, "summa" =>  $cartSums], 200);
    }

    /**
     * Показать Корзину Пользователю
     *
     * @return void
     */
    public function show()
    {
        parent::__construct(new SocialRepository(new \App\Social), new MenuRepository(new \App\Menu));
        $this->title = "cart";

        $has = Session::has('cart');                    // Проверяем есть ли в Сесси наш Корзина


        if ($has) {
            $itemCart = Session::get('cart');               // Получаем нашу Корзину из Сесси
            // $data = array_except($itemCart, ['sum', 'count']);      // (true) то тогда исключаем наш общий Сумму и общию Кол-ву из наш массива
            $cartProducts = Session::get('cart.products');      // (true) то тогда исключаем наш общий Сумму и общию Кол-ву из наш массива

            // dd($cartProducts);

            if ($cartProducts) {

                foreach($cartProducts as $id => $products) {                       // И получаем каждую по отделбносьтю

                    $product = $this->product_r->getById($id);         // Получить товар по ID из БД-х через Репозитории

                    $arr = [                                // Ставить в корзину о информации товара
                        "product_info"  => $product,                               // Получаем Модель товарв
                        "img"   => $product->getImage(),                            // Получить Изображение Товара
                        "id"    => $product->id,
                        "count" => $products['count'],                              // Получить Количество заказынного товара
                        "price" => $products['price'],                              // Получить Цену заказынного товара
                        "summa" => $products['summa'],                              // Получить Сумму заказынного товара
                    ];

                    $this->cart = array_add($this->cart, $id, $arr);
                }

                // return $this->outputView("cart", ["cart", "count", "summa"], [collect($this->cart), $cartCounts, $cartSums]);
            }
        }

        // dd(collect($this->cart));

        $cartCounts = Session::get('cart.count');
        $cartSums = Session::get('cart.sum');

        $cartCounts = ($cartCounts) ? $cartCounts : 0;
        $cartSums   = ($cartSums) ? $cartSums : 0;

        // dd($cartCounts,$cartSums);

        return $this->outputView("cart", ["cart", "count", "summa"], [collect($this->cart), $cartCounts, $cartSums]);
    }

    /**
     * Оформить заказ
     *
     * @param Request $request
     * @return void
     */
    public function cart_order(Request $request)
    {
        $data = $request->except("_token", "count");

        $cart = Session::get("cart");

        if (!Auth::check()) {
            // dd($data);
            $rules = [
                "name" => "required|min:2|max:50",
                "lastname" => "required|min:2|max:50",
                "email" => "required|email",
                "phone" => "required|numeric",
                "address" => "required|min:5|max:255",
                "shipping" => "required|min:5",
            ];


            $validator = Validator::make($data, $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput($data);
            }

            $customer  = $this->customer_r->create([
                "name_customer" => $data["name"],
                "last_name"  => $data["lastname"],
                "email" => $data["email"],
                "phone" => $data["phone"],
                "address"   => $data["address"],
                "shipping"  => $data["shipping"],
                "cart_count"  => $cart["count"],
                "cart_sum" => $cart["sum"],
            ]);

            // dd($data);
        }

        // dd($cart);

        foreach ($cart["products"] as $key => $product) {
            $order = $this->order_r->create([
                "customers_id"  =>  (Auth::check()) ? null : $customer->id,
                "products_id"   =>  $this->product_r->getById($key)->id,
                "count"         =>  $product["count"],
                "price_once"    =>  $product["price"],
                "summa"         =>  $product["summa"],
                "user_id"       =>  (Auth::check()) ? Auth::user()->id : null,
            ]);
        }

        Session::forget('cart');            // Очистем наш Корзину из Сесси

        Session::put('cart.count', 0);      // Обнулим общий кол-ву тов в Сесси
        Session::put('cart.sum', 0);        // Обнулим общий сумму тов в Сесси



        return redirect()->route("index")->with("success", trans("langue.thank_you_order_checked"));






    }


    /**
     * Удаление товар с корзины
     *
     * @param Request $request
     * @param [type] $id
     * @return void
     */
    public function destroy(Request $request) {

        if($request->ajax()) {
            $id_prod = $request->id_prod;               // получаем наший ID что бы удобно работать
            $count = Session::get('cart.count');        // получаем обшую Кол-ву из Корзины
            $sum = Session::get('cart.sum');            // получаем обшую Сумму из Корзины
            $del_prod_count = Session::get('cart.products.' . $id_prod . '.count');     // получаем Кол-ву по ID из Корзины
            $del_prod_summa = Session::get('cart.products.' . $id_prod . '.summa');     // получаем Сумму  по ID из Корзины

            Session::put('cart.sum',    $sum - $del_prod_summa);                        // И отнимаем (-) сумму из Общей Суммы нащего Корзины
            Session::put('cart.count',  $count - $del_prod_count);                      // И отнимаем (-) кол-ву из Общей Кол-ве нащего Корзины
            $del_product = Session::forget('cart.products.' . $id_prod);                // И Удоляем проиделенный товар по ID из Корзины

            return response()->json(["Товар Удален: cart." . $id_prod, Session::get('cart'), $request->all()], 200); // передаем данные в View нашему клиенту
        }

        abort(404);
    }

    /**
     * Очистить корзину
     *
     * @param Request $request
     * @return void
     */
    public function clear_cart(Request $request)
    {

        $clear_cart = $request->clear_cart;

        if($clear_cart) {
            Session::forget('cart');            // Очистем наш Корзину из Сесси

            Session::put('cart.count', 0);      // Обнулим общий кол-ву тов в Сесси
            Session::put('cart.sum', 0);        // Обнулим общий сумму тов в Сесси
            $all = Session::all();              // Полоучаем всю Сессию
            return response()->json($all, 200); // отправим ответ к Клиенту и к View для отображение в Корзине
        }

        return response()->json(Session::all(), 200); // отправим ответ к Клиенту и к View для отображение в Корзине

    }

}
