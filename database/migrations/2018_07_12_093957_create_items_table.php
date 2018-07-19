<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku');
            $table->string('tag');
            $table->string('sex');
            $table->string('title',155);
            $table->text('desc');
            $table->text('ad_desc');
            $table->string('img');
            $table->string('brand');
            $table->string('price');
            $table->string('discount');
            $table->string('color');
            $table->string('size');
            $table->string('path');
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
        Schema::dropIfExists('items');
    }
}
