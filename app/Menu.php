<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ["name", "prefix", "active"];

    /**
     * Связь Один ко Многим с Категорией
     *
     * @return void
     */
    public function categories()
    {
        return $this->hasMany('App\Category');   // , 'foreign_key', 'local_key'
    }

}
