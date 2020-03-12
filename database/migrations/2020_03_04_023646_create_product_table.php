<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('image1', 100)->nullable()->default('null.jpg');
            $table->string('image2', 100)->nullable()->default('null.jpg');
            $table->string('image3', 100)->nullable()->default('null.jpg');
            $table->string('title', 100);
            $table->string('content', 100);
            $table->text('description');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedBigInteger('typeProduct_id');
            $table->unsignedBigInteger('typeInfo_id');
            $table->foreign('color_id')->references('id')->on('color')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('size')->onDelete('cascade');
            $table->foreign('typeProduct_id')->references('id')->on('type_product')->onDelete('cascade');
            $table->foreign('typeInfo_id')->references('id')->on('type_info')->onDelete('cascade');
            $table->integer('price_unit')->default(0);
            $table->integer('price_promotion');
            $table->integer('Quantity')->default(1);
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
        Schema::dropIfExists('product');
    }
}
