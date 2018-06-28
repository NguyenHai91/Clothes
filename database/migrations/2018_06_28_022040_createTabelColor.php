<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelColor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('color', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id')->index();
        $table->string('name');
        $table->string('code_color');
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
      Schema::drop('color');
    }
  }
