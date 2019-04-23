<?php

namespace JonatheloShopping;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    /**
     *  The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'productName', 'productDescription', 'productPrice', 'imageFile',
        'user_id', 'category_id'
    ];
}
