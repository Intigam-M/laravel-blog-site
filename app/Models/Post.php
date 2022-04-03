<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "post";
    protected $fillable = 
    [
        "cat_url","author",
        "title_az","title_en","title_ru",
        "post_az","post_en","post_ru","tags",
        "image","youtube_frame","url","status","hit",
        "created","updated" 
    ];

    public $timestamps = false;

}
