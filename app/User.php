<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'avatar', 'avatar_original', 'name', 'lastname', 'email', 'role_id', 'password', 'site', 'location', 'profession'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Аватар по умолчанию
     *
     * @return string
     */
    public static function defaultAvatar(){
        return asset('fashe') . "/users/default/no-avatar.png";
    }

    /**
     * Получить Аватар пользователя
     *
     * @return string
     */
    public function getAvatar() {
        // dd($this->avatar);
        if ($this->avatar) {
            return asset("fashe") . "/users/" . $this->email . "/avatar/" . $this->avatar;
        }

        return $this->defaultAvatar();
    }

    /**
     * Получить Роль пользователя
     *
     * @return void
     */
    public function role()
    {
        return $this->belongsTo('App\Role');    // , 'foreign_key', 'other_key'
    }

    // Получить Заказы
    public function orders()
    {
        return $this->belongsTo('App\Order');   // , 'foreign_key', 'other_key'
    }



}
