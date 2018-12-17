<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ["name", "link", "img", "menu_id", "active"];

    // public function products()
    // {
    //     return $this->hasMany('App\Product');
    // }

    /**
     * Достать все продукты
     *
     * @return void
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', "category_products", "category_id", "product_id");  // , 'role_user_table', 'user_id', 'role_id'
    }

    /**
     * Обратная связь с Меню
     *
     * @return void
     */
    public function menu()
    {
        return $this->belongsTo('App\Menu');    // , 'foreign_key', 'other_key'
    }

    /**
     * Изображение по умолчанию
     *
     * @return string
     */
    public static function defaultImage(){
        return asset('fashe') . "/categories/default/no-image.jpg";
    }

    /**
     * Получить Изображение Категории
     *
     * @return string
     */
    public function getImage() {
        // dd($this->avatar);
        if ($this->img) {
            return asset("fashe") . "/categories/" . $this->name . "/image/" . $this->img;
        }

        return $this->defaultImage();
    }
}
