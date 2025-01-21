<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->bigInteger('order_id')->unsigned(); // Foreign key to orders table
            $table->bigInteger('store_id')->unsigned(); // Foreign key to stores table
            $table->integer('quantity'); // Quantity of items
            $table->json('order_items'); // JSON field for order items
            $table->string('currency', 3); // Currency code (e.g., USD)
            $table->decimal('total_amount', 10, 2); // Total amount
            $table->timestamps(); // Created at and updated at timestamps

            // Optionally, you can add foreign key constraints if needed
            // $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            // $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
};
