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
        $table->increments('id')->unsigned()->index();
        $table->string('name');
        $table->string('code_color');
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
