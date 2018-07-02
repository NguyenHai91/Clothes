<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('product', function (Blueprint $table)
      {
       $table->engine = 'InnoDB';
       $table->increments('id')->unsigned()->index();
       $table->string('name');
       $table->text('description');
       $table->float('price');
       $table->text('preview');
       $table->string('brand');
       $table->string('image');
       $table->integer('category_id')->unsigned()->index();
       $table->integer('number_order');
       $table->integer('view');
       $table->integer('discount');
       $table->integer('active');
       $table->integer('gender');
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
      Schema::drop('products');
    }
  }
