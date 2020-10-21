<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_comments', function (Blueprint $table) {
            $table->increments('com_id');
            $table->String('com_name');
            $table->String('com_email');
            $table->String('com_content');
            $table->integer('com_product')->unsigned();
            $table->foreign('com_id')->references('p_id')->on('db_product')->onDelete('cascade');
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
        Schema::dropIfExists('db_comments');
    }
}
