<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',

    ];

    //funcion para usarios
    public function user(){
        return $this->belongsTo('App\Models\User');
    }


    public function products(){
        return $this->belongsToMany('App\Models\Product')->withPivot('quantity')->withTimestamps();
       // return $this->belongsToMany('App\Models\Product')->withPivot('product_id')->withTimestamps();
    }



}
