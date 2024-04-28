<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('image', 255);
            $table->text('image_extra')->nullable();
            $table->string('link', 255)->nullable();
            $table->string('intro', 120)->nullable();
            $table->text('description')->nullable();
            $table->string('location', 255)->nullable();
            $table->tinyInteger('order_no')->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('banners');
    }
}
