<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteImage extends Model
{
    //
    public $fillable = ['user_id', 'my_image_id', 'image_type', 'api_image_url'];
}
