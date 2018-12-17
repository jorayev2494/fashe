<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $fillable = ["name", "prefix", "active"];

    /**
     * Получить товары со статусом
     *
     * @return void
     */ 
    public function products()
    {
        return $this->hasMany('App\Product');   // , 'foreign_key', 'local_key'
    }
}
