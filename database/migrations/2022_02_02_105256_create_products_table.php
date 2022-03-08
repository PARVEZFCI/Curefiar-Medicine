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
            $table->foreignId("category_id");  
            $table->foreignId("sub_category_id")->nullable(); 
            $table->foreignId("sub_sub_category_id")->nullable();    
            $table->string('name', 200);
            $table->string('slug', 200);   
            $table->string('product_unit', 200); 
            $table->string('image', 256)->nullable();
            $table->string('thumbnail_image', 200)->nullable();
            $table->integer('qty')->default(1);
            $table->double('price');
            $table->integer('discount')->nullable();
            $table->double('discount_price')->nullable();
            $table->double('shipping_cost')->nullable();
            $table->longText('description')->nullable();
            $table->integer('num_sell')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
             
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('sub_category_id')->references('id')->on('product_sub_categories')->onDelete('cascade');
            $table->foreign('sub_sub_category_id')->references('id')->on('product_sub_sub_categories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('updated_by')->references('id')->on('users');
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
