<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_post', function (Blueprint $table) {
            $table->increments('post_id');
            $table->string('post_title')->nullable();
            $table->text('post_desc')->nullable();
            $table->text('post_content')->nullable();
            $table->String('post_meta_desc')->nullable();
            $table->string('post_meta_keywords')->nullable();
            $table->tinyInteger('post_status')->default(1)->index();
            $table->string('post_img')->nullable();
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
        Schema::dropIfExists('db_post');
    }
}
