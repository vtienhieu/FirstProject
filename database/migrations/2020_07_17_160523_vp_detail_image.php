<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpDetailImage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_detailImage', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('product_id')->unsigned();
            $table->foreign('product_id')->references('prod_id')->on('vp_products')->onDelete('cascade');
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
        Schema::dropIfExists('vp_detailImage');
    }
}
