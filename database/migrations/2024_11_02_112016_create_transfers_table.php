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
        Schema::create('transfers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained('product_sizes')->onDelete('cascade'); // ID of the product size being transferred
            $table->foreignId('store_id')->constrained('stores')->onDelete('cascade'); // Target store ID
            $table->integer('quantity'); // Quantity being transferred
            $table->timestamp('transferred_at')->useCurrent(); // Date and time of transfer
            $table->timestamps(); // Created and updated timestamps
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
        Schema::dropIfExists('transfers');
    }
};
