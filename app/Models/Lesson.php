<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;
    protected $table = "lesson";
    protected $fillable = 
    [
        "cat_url",
        "title_az","title_en","title_ru","tags",
        "post_az","post_en","post_ru",
        "youtube_frame","url","status","hit",
        "created_at","updated_at" 
    ];

}
