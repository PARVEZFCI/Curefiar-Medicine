<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->unsigned()->nullable();
            $table->mediumText("order_code")->nullable();
            $table->longText('shipping_address')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->nullable()->default('unpaid');
            $table->string('payment_details')->nullable();
            $table->string('total_product')->nullable();
            $table->double('grand_total',8,2)->nullable();
            $table->date('order_date')->nullable();
            $table->tinyInteger('order_status')->nullable()->default(0)->comment('0=pending','1=approve', '2=on the way', '3=delivary');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
