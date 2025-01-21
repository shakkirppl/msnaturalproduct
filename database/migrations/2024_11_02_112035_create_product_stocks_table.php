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
        Schema::create('product_stocks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained('product_sizes')->onDelete('cascade'); // ID of the product size
            $table->foreignId('store_id')->nullable()->constrained('stores')->onDelete('cascade'); // ID of the store (nullable for production unit)
            $table->string('location')->default('production_unit'); // Location identifier, e.g., 'production_unit' or 'store'
            $table->integer('quantity')->default(0); // Current stock quantity
            $table->timestamps();
            $table->softDeletes(); // Deleted at timestamp for soft deletes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_stocks');
    }
};
