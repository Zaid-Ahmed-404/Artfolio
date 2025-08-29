<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyImage extends Model
{
    //

    public $fillable = [
        "title",
        "description",
        "image"
    ];
}
