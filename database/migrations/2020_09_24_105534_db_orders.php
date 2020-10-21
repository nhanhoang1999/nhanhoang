<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('o_transactions_id')->unsigned();
            $table->integer('o_product_id')->unsigned();
            $table->string('o_qty')->nullable();
            $table->string('o_price')->nullable();
            $table->string('o_sale')->nullable();
            $table->foreign('o_transactions_id')
                ->references('id')
                ->on('db_transactions')
                ->onDelete('cascade');
            $table->foreign('o_product_id')
                ->references('p_id')
                ->on('db_product')
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
        Schema::dropIfExists('db_orders');
    }
}
