<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonCategory extends Model
{
    use HasFactory;
    protected $table = "lesson_category";
    protected $fillable = ["cat_az","cat_en","cat_ru","title_az","title_en","title_ru","url","created_at","updated_at" ];
}
