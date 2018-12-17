<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = ["customers_id", "products_id", "price_once", "status", "count", "summa", "user_id"];

    // Получить Продуктов
    public function products()
    {
        return $this->hasMany('App\Product', 'id', 'products_id');  //
    }

    // Получить Пользователей Заказчиков
    // public function users()
    // {
    //     return $this->hasMany('App\User');      // , 'foreign_key', 'local_key'
    // }

}
