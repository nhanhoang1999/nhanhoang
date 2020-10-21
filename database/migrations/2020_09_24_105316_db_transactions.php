<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tr_customers_id')->unsigned();
            $table->integer('tr_total')->default(0);
            $table->string('tr_note')->nullable();
            $table->string('tr_address')->nullable();
            $table->string('tr_phone')->nullable();
            $table->tinyInteger('tr_status')->default(0)->index();
            $table->foreign('tr_customers_id')
                ->references('id')
                ->on('db_customers')
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
        Schema::dropIfExists('db_transactions');
    }
}
