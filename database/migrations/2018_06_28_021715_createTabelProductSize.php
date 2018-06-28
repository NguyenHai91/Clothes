<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelProductSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product_size', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->integer('size_id')->unsigned()->index();
        $table->integer('product_id')->unsigned()->index();
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
      Schema::drop('product_size');
  }
}
