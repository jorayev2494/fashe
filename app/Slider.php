<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ["title", "info", "link", "image", "active"];

    /**
     * Изображение по умолчанию
     *
     * @return string
     */
    public static function defaultImage() {
        return asset('fashe') . "/sliders/default/no-image.jpg";
    }

    /**
     * Получить Изображение Слайдера
     *
     * @return string
     */
    public function getImage() {

        if ($this->image) {
            return asset("fashe") . "/sliders/image/" . $this->id . "/" . $this->image;
        }

        return $this->defaultImage();
    }
}
