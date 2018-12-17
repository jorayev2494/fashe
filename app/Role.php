<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ["title", "prefix", "active"];
    
    /**
     * Получить пользователей с такой Роли
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany('App\User');  // , 'foreign_key', 'local_key'
    }
}
