<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInDbCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('db_customers', function (Blueprint $table) {
            //
            $table->string('facebook_id')->nullable();
            $table->string('code')->nullable();
            $table->string('time_code')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('db_customers', function (Blueprint $table) {
            //
            $table->dropColumn(['code','facebook_id','time_code']);
        });
    }
}
