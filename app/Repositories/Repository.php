<?php

namespace App\Repositories;

use Config;

abstract class Repository
{
    public $model;

    /**
     * Получит все товары из Дб-х
     *
     * @param string $select
     * @param boolean $paginate
     * @return void
     */
    public function get($select = "*", $paginate = false) {
        $builder = $this->model->select($select)->get();

        if ($paginate) {
            return $builder = $this->model->select($select)->paginate($paginate);
        }

        return $builder;
    }

    public function getActive($select = "*", $find = false) {
        $builder = $this->model->select($select)->where("active", true);

        if ($find) {
            $builder->find($find);
            // dd($builder->get());
            // return $builder;
        }

        return $builder->get();
    }

    public function defaultAva() {
        return $builder = $this->model->defaultAvatar();
    }

    /**
     * Получить сортированный данный из Бд-х
     *
     * @param string $select
     * @param [type] $orderBy
     * @param [type] $take
     * @param [type] $paginate
     * @return void
     */
    public function getSortBy(string $select = "*", string $orderBy = null, $take = null, $paginate = null)
    {
        // dd($select, $orderBy, $take, $paginate);
        $builder = $this->model->select($select)->where("active", true);

        /**
         * Сортировать по $orderBy
         */
        if ($orderBy)
            $builder = $this->model->select($select)->where("active", true)->orderBy($orderBy, "desc");

        /**
         * Брать только $take
         */
        if ($take)
            $builder->take($take);

        /**
         * Пагинация по $paginate
         */
        if ($paginate)
            return $builder->paginate($paginate);

        return $builder->get();
    }


    /**
     * Получить товары по Статусу
     *
     * @param string $status
     * @param [type] $take
     * @return void
     */
    public function getByStatus($status = "*", $take = null)
    {
        $getBuilder = $this->model->where("active", true)->where("prefix", $status)->get();

        if ($getBuilder) {
            foreach($getBuilder as $status) {
                if($status->prefix == "sale") {
                    return $status->products->take($take);
                }
            }
        }

        abort(404);
    }

    /**
     * Возвращает Элемент под условие Where
     *
     * @param string $nameWhere
     * @param string $where
     * @return void
     */
    public function getByWhere(string $nameWhere, string $where/*, int $paginate*/)
    {
        $builder = $this->model->where("active", true)->where($nameWhere, $where)->get();
        return $builder[0];
    }



    /**
     * Получить заказы Пользователь
     *
     * @param integer $id
     * @return void
     */
    public function getMyOrders(int $id)
    {
        $builder = $this->model->where("user_id", $id)->get();
        return $builder;
    }

    /**
     * Получить строго по ID Пользователя
     *
     * @param number $id
     * @return Collection
     */
    public function getStrictlyById($id = null) {
        return $builder = $this->model->findOrFail($id);
    }

    public function getById($id = null) {
        return $this->getStrictlyById($id);
    }

    /**
     * Создать данный в БД-у
     *
     * @param array $data
     * @return void
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * Обновить данный в БД-у
     *
     * @param array $data
     * @return void
     */
    public function update(array $data)
    {
        return $this->model->update($data);
    }


    /**
     * Получить товары с горловыми ценами Min и Max
     *
     * @param string $select
     * @param string $orderBy
     * @param [type] $take
     * @param [type] $paginate
     * @return array
     */
    public function getProdByPrice(string $select = "*", string $orderBy = null, $take = null, $paginate = null) : array
    {
        // dd($select, $orderBy, $take, $paginate);
        $builder = $this->model->select($select)->where("active", true);

        /**
         * Сортировать по $orderBy
         */
        if ($orderBy)
            $builder = $this->model->select($select)->where("active", true)->orderBy($orderBy, "desc");

        /**
         * Брать только $take
         */
        if ($take)
            $builder->take($take);

        /**
         * Пагинация по $paginate
         */
        if ($paginate) {
            // return array($builder->paginate(2)->only([20, 22, 25, 26]));
            $price_products = $this->priceSelectedProducts($builder->get());
            // dd($price);
            $builder = $builder->paginate($paginate);

            $result = array(
                "price_products" => $price_products,
                "products" => $builder,
            );

            // dd($result);

            return $result;
        }

        return $builder->get();
    }

    /**
     * Получить Цены товаров
     *
     * @param integer $min_price
     * @param integer $max_price
     * @return array
     */
    protected function priceSelectedProducts($products) : array
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
     * Получить товары который советует цене который выбрал пользователь
     *
     * @param string $select
     * @param string $orderBy
     * @param [type] $take
     * @param [type] $paginate
     * @return array
     */
    public function getSelectedProd(string $select = "*", string $orderBy = null, int $min_price = null, int $max_price = null, $paginate = null) : array
    {
        $builder = $this->model->select($select)->where([
                                                            ["active", "=", true],          // Активный
                                                            ["price", ">=", $min_price],    // Min - Минимальный цена
                                                            ["price", "<=", $max_price],    // Max - Максимальный цена

                                                            // Проверка Скиданные проверки
                                                            // ["discount", ">=", $min_price],    // Min - Минимальный цена
                                                            // ["discount", "<=", $max_price],    // Max - Максимальный цена



                                                        ]);


        /**
         * Сортировать по $orderBy
         */
        if ($orderBy)
            $builder = $builder->orderBy($orderBy);
            // $builder = $this->model->select($select)->where("active", true)->orderBy($orderBy, "desc");

        /**
         * Пагинация по $paginate
         */
        if ($paginate) {
            $price_products = $this->priceSelectedProducts($this->getActive());
            // $selected_price = $this->priceSelectedProducts($builder->get());
            $builder = $builder->paginate($paginate);


            $result = array(
                "price_products" => $price_products,
                // "selected_price" => $selected_price,
                "products" => $builder,
            );

            return $result;
        }
        

        $price_products = $this->priceSelectedProducts($this->getActive());

        return $result = array(
            "price_products" => $price_products,
            // "selected_price" => $selected_price,
            "products" => $builder->get(),
        );
    }

    /**
     * Находить продукты по Категории и возвращать с ценами
     *
     * @param boolean $find
     * @param boolean $paginate
     * @return void
     */
    public function getByCategProd($category, $sortBy = false , $paginate = false)
    {
        $builder = $this->model->where("active", true)->where("category_id", $category->id);
        // dd($this->model->get());
        /**
         * Сортировать по $sortBy
         */
        // if ($sortBy) {
        //     $builder->orderBy($sortBy);
        // }

        if ($paginate) {

            // dd($builder->get());

            $price_products = $this->priceSelectedProducts($builder->get());
            $builder = $builder->paginate($paginate);

            $result = array(
                "price_products" => $price_products,
                "products" => $builder,
            );

            return $result;

        }

        return $builder;
    }

    /**
     * Поиск продуктов по Имени (name)
     *
     * @param [type] $search
     * @return void
     */
    public function search($search)
    {

        $builder = $this->model->where([
                            ["active", "=", true],
                            ["name", "=", $search],
                        ])->get();

        return [
            "products" => $builder,
            "cont_searched" => count($builder),
            "search" => $search,
        ];
    }

    // Получить заказов По customers_id или user_id
    public function getOrderNotNull($rowName)
    {
        $builder = $this->model->select("*")->where($rowName, "!=", null)->get();
        return $builder;
    }

    public function find($id)
    {
        $builder = $this->model->find($id);
    }

}
