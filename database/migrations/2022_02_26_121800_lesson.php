<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Lesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->id();
            $table->string('cat_url');
            $table->foreign('cat_url')->references('url')->on('lesson_category')->onUpdate('cascade');
            $table->string('title_az');
            $table->string('title_en')->nullable();
            $table->string('title_ru')->nullable();
            $table->text('post_az');
            $table->text('post_en')->nullable();
            $table->text('post_ru')->nullable();
            $table->string('tags')->nullable();
            $table->text('youtube_frame')->nullable();
            $table->string('url')->unique();
            $table->integer('status');
            $table->integer('hit')->default('0');
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
        Schema::dropIfExists('lesson');
    }
}
