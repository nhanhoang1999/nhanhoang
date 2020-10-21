<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_product', function (Blueprint $table) {
            $table->increments('p_id');
            $table->string('p_name')->nullable();
            $table->string('p_slug')->index();
            $table->integer('p_number')->nullable();
            $table->integer('p_price')->default(0);
            $table->string('p_img');
            $table->string('p_warranty')->nullable();
            $table->string('p_accessories')->nullable(); //phu kien
            $table->string('p_condition')->nullable();   //tinh trang
            $table->integer('p_promotion')->default(0);  //khuyen mai
            $table->tinyInteger('p_status');        //trang thai
            $table->text('p_description')->nullable();    //mo ta
            $table->tinyInteger('p_featured');       //san pham dac biet
            $table->tinyInteger('p_active')->default(1)->index();
            $table->string('p_keyword')->nullable();
            $table->integer('p_cate_id')->unsigned();
            $table->foreign('p_cate_id')
                ->references('id')
                ->on('db_categories')
                ->onDelete('cascade');
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
        Schema::dropIfExists('db_product');
    }
}
