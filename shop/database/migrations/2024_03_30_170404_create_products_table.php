<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('slug', 255);
            $table->string('image', 255);
            $table->text('image_extra')->nullable();
            $table->bigInteger('category_id')->unsigned();
            $table->bigInteger('quantity')->unsigned()->default(0);
            $table->tinyInteger('promotion')->unsigned()->default(0);
            $table->bigInteger('import_price')->unsigned()->default(0);
            $table->bigInteger('price')->unsigned()->default(0);
            $table->string('size', 255)->nullable();
            $table->string('color', 255)->nullable();
            $table->string('intro', 120)->nullable();
            $table->text('description')->nullable();
            $table->text('detail_description')->nullable();
            $table->boolean('status');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('products');
    }
}
