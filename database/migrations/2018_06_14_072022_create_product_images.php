<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('product_images', function (Blueprint $table){
      $table->engine = 'InnoDB';
      $table->increments('id')->unsigned()->index();
      $table->string('image');
      $table->integer('product_id')->unsigned()->index();
      
    });
     
   }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('product_images');
    }
  }
