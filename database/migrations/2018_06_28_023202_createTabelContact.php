<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('contact', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id')->index();
        $table->string('name');
        $table->string('email');
        $table->integer('phone');
        $table->string('title');
        $table->text('message');
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
      Schema::drop('contact');
    }
  }
