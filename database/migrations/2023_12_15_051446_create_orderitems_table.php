<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderitemsTable extends Migration
{
    public function up()
    {
        Schema::create('orderitems', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->unsignedBigInteger('food_id');
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            // Tambahkan kolom lain yang diperlukan untuk order items
            $table->timestamps();

            #$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            #$table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orderitems');
    }
}

