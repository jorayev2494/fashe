<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use File;

class Product extends Model
{
    protected $fillable = ["name", "img", "category_id", "price", "discount", "size", "count", "color", "status_id", "description", "active"];

    // public function category()
    // {
    //     return $this->belongsTo('App\Category', "category_id", "id");
    // }

    /**
     * Получить категории
     *
     * @return void
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category', "category_products", "product_id", "category_id");  // , 'role_user_table', 'user_id', 'role_id'
    }


    /**
     * Получить статус товара
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo('App\Status');  // , 'foreign_key', 'other_key'
    }

    /**
     * Получить Категорию
     *
     * @return void
     */
    public function getCategory()
    {
        return $this->categories;
    }


    /**
     * Получить фоты из ДБ-х
     *
     * @return void
     */
    public function getPhotos()
    {

        $result = array();

        $images = json_decode($this->img);

        if ($images) {
            foreach($images as $key => $image) {
                $result = array_add($result, $key, asset("fashe") . "/products/" . $image);
            }
        } else {
            $result = array_add($result, "img_1", asset("fashe") . "/products/default/not_images.jpg");
        }

        return $result;
    }

    public function getImage()
    {
        $image = $this->getPhotos();
        // dd($image);
        return $image["img_0"] ?? $image["img_1"];
    }

    /**
     * Удаление фото из сервера
     *
     * @return boolean
     */
    public function deletePhotos() : bool
    {
        if ($this->img) {
            foreach (json_decode($this->img) as $key => $img) {
                $result = File::delete(public_path("fashe") . "\\products\\" . $img);
            }
            return true;
        }
        return false;
    }

    // Получение Продукты
    public function orders()
    {
        return $this->belongsTo('App\Product');     // , 'foreign_key', 'other_key'
    }



}
