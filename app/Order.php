<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_email',
        'order_number',
        'shipping_details',
        'cart',
        'payment_method',
        'order_total',
        'status',
    ];
}
