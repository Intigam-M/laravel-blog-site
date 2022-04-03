<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    protected $table = "post_category";
    protected $fillable = ["cat_az","cat_en","cat_ru","color","url","created_at","updated_at" ];
}
