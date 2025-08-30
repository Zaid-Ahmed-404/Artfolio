<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavoriteImage extends Model
{
    //
    public $fillable = ['user_id', 'my_image_id', 'image_type', 'api_image_url'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function myImage()
    {
        return $this->belongsTo(MyImage::class, 'my_image_id');
    }
}
