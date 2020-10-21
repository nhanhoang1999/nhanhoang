<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DbCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('c_name')->unique();
            $table->string('c_slug')->index();
            $table->char('c_icon')->nullable();
            $table->string('c_description_seo')->nullable();
            $table->string('c_title_seo')->nullable();
            $table->string('c_keyword_seo')->nullable();
            $table->string('c_total_seo')->default(0);
            $table->tinyInteger('c_active')->default(1)->index();
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
        Schema::dropIfExists('db_categories');
    }
}
