<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContrain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_images', function (Blueprint $table)
        {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::table('product_detail', function (Blueprint $table)
        {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::table('order', function (Blueprint $table)
        {
            $table->foreign('product_id')->references('id')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('product', function (Blueprint $table)
        {
            $table->foreign('category_id')->references('id')->on('category')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('order', function (Blueprint $table)
        {

            $table->foreign('transaction_id')->references('id')->on('transaction')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
