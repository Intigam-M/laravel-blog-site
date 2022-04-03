<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LessonCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_category', function (Blueprint $table) {
            $table->id();
            $table->string('cat_az');
            $table->string('cat_en')->nullable();
            $table->string('cat_ru')->nullable();
            $table->text('title_az');
            $table->text('title_en')->nullable();
            $table->text('title_ru')->nullable();
            $table->string('url')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_category');
    }
}
