<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Repositories\AdminMenuRepository;
use Illuminate\Support\Arr;
use Session;
use View;
use Lang;
use Auth;
// use Arr;

class AdminMasterController extends Controller
{
    protected $adn_menu_r;                  // Админ Меню Репозитории
    protected $adn_user_r;                  // Админ User Репозитории
    protected $adn_product_r;               // Админ Product Репозитории
    protected $adn_category_r;              // Админ Category Репозитории
    protected $adn_status_r;                // Админ Status Репозитории
    protected $adn_role_r;                  // Роль Пользователя
    protected $adn_slider_r;                // Слайд сайта
    protected $adn_social_r;                // Социальный сети

    protected $adn_order_r;                 // Социальный Заказы
    protected $adn_costumer_r;              // Социальный Заказчики

    protected $adn_sidebar_r = false;       // Админ СайдБар

    protected $adn_title;                   // Админ Title
    protected $adn_template;                // Админ Вид (View)
    protected $adn_vars = array();          // Админ Данные к Виду

    public function __construct(AdminMenuRepository $adminMenu = null) {
        $this->adn_menu_r = $adminMenu;



        $admin_menus = $this->adn_menu_r->get();
        $this->adn_vars = array_add($this->adn_vars, "admin_menus", $admin_menus);
    }


    /**
     * Вывод Интерфейс Админа на Экран
     *
     * @param string $view
     * @param string $dataName
     * @param mixed $data
     * @return View
     */
    public function outputAdminView(string $view, $dataName = false, $data = false) {

        $this->adn_vars = Arr::add($this->adn_vars, "title", Lang::get("admin." . $this->adn_title));

        if ($dataName) {
            if(!is_array($dataName) && !is_array($data)) {
                $this->adn_vars = Arr::add($this->adn_vars, $dataName, $data);
            } else {
                foreach ($dataName as $key => $name) {
                    $this->adn_vars = Arr::add($this->adn_vars, $name, $data[$key]);
                }
            }
        }
        // dd($this->adn_vars);
        return View::make($view)->with($this->adn_vars);
        // $contents = View::make($view)->with($this->adn_vars);
        // return \Response::make($contents, 200)->withHeaders(['Content-Twwwwwype' => 'tewwxt/plwwainww']);
    }

    // Отображение Сесси
    public function sessionAlert(string $type, string $value, $data = false) {
        return Session::put($type, Lang::get("admin." . $value));
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
    public function jsonToStr(string $char = " ", $data)
    {
        $arr = json_decode($data, true);

        $string = implode($char, $arr);

        return $string;
    }
}
