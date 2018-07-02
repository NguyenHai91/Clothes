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

        Schema::table('category', function (Blueprint $table)
        {
            $table->foreign('id')->references('category_id')->on('product')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('transaction', function (Blueprint $table)
        {

            $table->foreign('id')->references('transaction_id')->on('order')->onDelete('cascade')->onUpdate('cascade');
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
