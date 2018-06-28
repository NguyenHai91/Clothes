<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('order', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id')->index();
        $table->integer('transaction_id')->unsigned()->index();
        $table->integer('product_id')->unsigned()->index();
        $table->integer('quantity');
        $table->integer('size');
        $table->integer('color');
        $table->double('amount');
        $table->text('note');
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
      Schema::drop('order');
    }
  }
