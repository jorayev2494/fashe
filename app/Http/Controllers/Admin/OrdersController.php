<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Repositories\OrderRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use App\Repositories\AdminMenuRepository;
use App\AdminMenu;

class OrdersController extends AdminMasterController
{

    protected $orders = array();

    public function __construct(UserRepository $users, CustomerRepository $customers, OrderRepository $orders) {

        parent::__construct(new AdminMenuRepository(new AdminMenu));
        $this->adn_user_r       = $users;
        $this->adn_costumer_r   = $customers;
        $this->adn_order_r      = $orders;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->adn_title = "orders";

        // Получить Зарегистрированного Пользователей
        // $users = $this->adn_user_r->get();

        // Получить не Зарегистрированного Заказчиков
        // $customers = $this->adn_costumer_r->get();

        // Получить Заказы
        $orders = $this->adn_order_r->get();
        // $orders = \App\Order::paginate(5);

        // dd($orders);

        // Зарегистрированный Заказчики
        $registeredCustomers = $this->adn_order_r->getOrderNotNull("user_id");
        // Не Зарегистрированный Заказчики
        $notRegisteredCustomers = $this->adn_order_r->getOrderNotNull("customers_id");

        foreach ($orders as $key => $order) {

            if ($order->user_id) {

                $orders = [
                    "order" => $order,
                    "this_customer" => $this->adn_user_r->getById($order->user_id),
                    // "order" => $order,
                    // "this_customer" => \App\User::find($order->user_id),

                ];

                $this->orders = array_add($this->orders, $key, $orders);

            } else {

                $orders = [
                    "order" => $order,
                     "this_customer" => $this->adn_costumer_r->getById($order->customers_id),
                    // "this_customer" => \App\Customer::find($order->customers_id),
                ];
                $this->orders = array_add($this->orders, $key, $orders);

            }

        }

        // dd(($this->orders));

        return $this->outputAdminView("admin.pages.orders.index", ["orders"], [$this->orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo __METHOD__;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->adn_title = "processing_order";
        $order = $this->adn_order_r->getById($id);

        if ($order->user_id) {

            $orders = [
                "order" => $order, "this_customer" => $this->adn_user_r->getById($order->user_id),
            ];
            $this->orders = array_add($this->orders, 0, $orders);

        } else {

            $orders = [
                "order" => $order, "this_customer" => $this->adn_costumer_r->getById($order->customers_id),
            ];
            $this->orders = array_add($this->orders, 0, $orders);

        }

        return $this->outputAdminView("admin.pages.orders.info", ["order"], [$this->orders[0]]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        echo __METHOD__;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->except("_token", "_method");

        // dd($data);

        $order = $this->adn_order_r->getById($id);

        $order->update([
            "status" => isset($data["status"]) ? true : false,
        ]);


        if ($request->has("status")) {
            $this->sessionAlert("success", "order_processed");
        }

        return redirect()->route("admin.orders.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = $this->adn_order_r->getById($id);

        // dd($order->customers_id);

        if ($order->customers_id) {
            $customer = $this->adn_costumer_r->getById($order->customers_id);
            $test = $order->delete();
            $test = $customer->delete();
        }

        $test = $order->delete();

        $this->sessionAlert("success", "order_deleted");

        return redirect()->route("admin.orders.index");
    }
}
