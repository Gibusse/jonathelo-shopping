<?php

namespace JonatheloShopping;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use Notifiable;

    /**
     *  The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoryName', 'categoryDescription', 'user_id'
    ];

}
