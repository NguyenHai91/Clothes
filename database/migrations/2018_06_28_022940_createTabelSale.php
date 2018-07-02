<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTabelSale extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sale', function (Blueprint $table){
        $table->engine = 'InnoDB';
        $table->increments('id')->unsigned()->index();
        $table->string('name');
        $table->integer('discount');
        $table->dateTime('start_date');
        $table->dateTime('end_date');        
    });
  }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('sale');
  }
}
