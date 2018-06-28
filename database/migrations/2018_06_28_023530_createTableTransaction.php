<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaction', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned()->index();
        $table->integer('status');
        $table->integer('user_id')->index()->nullable();
        $table->string('username');
        $table->string('email');
        $table->integer('phone');
        $table->string('address');
        $table->double('amount');
        $table->string('payment');
        $table->string('payment_info');
        $table->text('message');
        $table->string('security');
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
      Schema::drop('transaction');
    }
  }
