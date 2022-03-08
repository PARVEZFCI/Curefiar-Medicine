<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('medicine_name', 200);
            $table->string('slug', 200);
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('generic_id')->nullable();
            $table->unsignedBigInteger('manufacture_id')->nullable();
            $table->string('dosage')->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('convertion_factor')->nullable();
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('medicine_categories')->onDelete('cascade');
            $table->foreign('generic_id')->references('id')->on('generics')->onDelete('cascade');
            $table->foreign('manufacture_id')->references('id')->on('manufactures')->onDelete('cascade');
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
        Schema::dropIfExists('medicines');
    }
}
