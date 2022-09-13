<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'sale_mode', 'status'];

    public function products(){
        return $this->hasMany('App\Product');
    }
}
