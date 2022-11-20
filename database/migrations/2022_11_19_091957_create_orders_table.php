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
        $table->decimal('amount');
        $table->unsignedBigInteger('product_id');
        $table->unsignedBigInteger('client_id');
        $table->unsignedBigInteger('supplier_id');
        $table->string('client_address');
        $table->timestamps();
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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