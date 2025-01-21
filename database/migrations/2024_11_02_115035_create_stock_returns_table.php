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
        Schema::create('stock_returns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained('product_sizes')->onDelete('cascade'); // ID of the returned product size
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade'); // ID of the store returning the stock
            $table->integer('quantity'); // Quantity returned
            $table->text('reason')->nullable(); // Reason for return
            $table->timestamp('returned_at')->useCurrent(); // Date and time of return
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
        Schema::dropIfExists('stock_returns');
    }
};
