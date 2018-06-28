<?php


use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('category', function (Blueprint $table)
    	{
    		$table->engine = 'InnoDB';
    		$table->increments('id')->index();
    		$table->string('name');
    		$table->string('description');
    		$table->integer('parent_id')->unsigned()->index();
    		$table->integer('gender');
    		$table->integer('active');

    	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::drop('category');
    }
}
