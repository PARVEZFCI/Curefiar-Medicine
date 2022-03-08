<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId("order_id")->unsigned()->nullable();
            $table->integer("product_id")->nullable();
            $table->integer("medicine_id")->nullable();
            $table->string("product_name")->nullable();
            $table->string("product_type")->nullable();
            $table->double("discount", 8,2)->nullable();
            $table->double("price", 8,2)->nullable();
            $table->integer("quantity")->nullable();
            $table->double("sub_total", 8,2)->nullable();
            $table->string("unit")->nullable();
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
