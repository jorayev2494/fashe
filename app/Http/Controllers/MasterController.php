<?php

namespace App\Http\Controllers;

use App\Repositories\MenuRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Lang;
use View;
use App\Repositories\SocialRepository;

class MasterController extends Controller
{
    protected $user_r;
    protected $menu_r;
    protected $category_r;
    protected $product_r;
    protected $sidebar_r;
    protected $status_r;
    protected $role_r;                  // Роль Пользователя
    protected $slider_r;
    protected $social_r;
    protected $subscribe_r;

    protected $customer_r;
    protected $order_r;

    protected $cart = array();          // Корзина сайта



    protected $title;
    protected $template;
    protected $vars = array();

    public function __construct(SocialRepository $socials, MenuRepository $menus)
    {
        $this->menu_r = $menus;
        $this->social_r = $socials;

        $socials = $this->social_r->getActive();
        $menus = $this->menu_r->getActive();

        $this->vars = array_add($this->vars, "socials",$socials);
        $this->vars = array_add($this->vars, "menus", $menus);
    }


    /**
     * Вывод интерфейс пользователям View
     *
     * @param string $view
     * @param boolean $dataName
     * @param boolean $data
     * @return void
     * Author:  jorayev2494@gmail.com
     */
    public function outputView(string $view, $dataName = null, $data = false) {

        $this->vars = Arr::add($this->vars, "title", Lang::get("langue." . $this->title));

        if ($dataName) {
            if(!is_array($dataName) && !is_array($data)) {
                $this->vars = Arr::add($this->vars, $dataName, $data);
            } else {
                foreach ($dataName as $key => $name) {
                    $this->vars = Arr::add($this->vars, $name, $data[$key]);
                }
            }
        }

        echo "Author:  jorayev2494@gmail.com";

        // dd($this->vars);
        return View::make("fashe.pages." . $view)->with($this->vars)->with("vars", $this->vars);

    }

    /**
     * Цены товаров
     *
     * @param integer $min_price
     * @param integer $max_price
     * @return array
     */
    protected function priceProducts($products) : array
    {

        $prices = $products->pluck("price", "id")->toArray();

        // Получить Минимальную цену из Ценника
        $min_price = min($prices);

        // Получить Максимальную цену из Ценника
        $max_price = max($prices);

       return [
            "min_price" => $min_price,
            "max_price" => $max_price,
        ];
    }

    /**
     * Выбранный цена Пользователям
     *
     * @param integer $min_select
     * @param integer $max_select
     * @return array
     */
    protected function selectedPrice(int $min_select, int $max_select) : array
    {
        return [
            "min_selected" => $min_select,
            "max_selected" => $max_select,
        ];
    }

    /**
     * Разделяет строку по символу
     *
     * @param string $name
     * @param string $char
     * @param [type] $data
     * @return json
     */
    public function strToJson(string $name = "item", string $char = " ", $data)
    {
        $result = array();

        $sizes = explode($char, $data);

        foreach ($sizes as $key => $item) {
            $result = array_add($result, $name . "_" . $key, trim($item));
        }
        // $json = json_encode($result);
        return json_encode($result);
    }

    /**
     * Массив превратить в строку
     *
     * @param string $name
     * @param string $char
     * @param [type] $data
     * @return json
     */
    public function jsonToStr(string $char = " ", $data, $array = false)
    {
        $arr = json_decode($data, true);

        if ($array) {
            return json_decode($data, true);
        }

        $string = implode($char, $arr);

        return $string;
    }

}
