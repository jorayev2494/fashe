<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = ["name_customer", "last_name", "email", "phone", "address", "shipping", "cart_count", "cart_sum"];

    public function orders()
    {
        return $this->belongsTo('App\Order');   // , 'foreign_key', 'other_key'
    }
}
