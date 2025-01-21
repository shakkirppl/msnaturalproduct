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
        Schema::create('bom_by_product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_master'); // Reference to BOM master
            $table->unsignedBigInteger('user_id'); // Reference to user
            $table->unsignedBigInteger('by_product_id'); // Reference to by-product
            $table->unsignedBigInteger('by_unit'); // Unit of by-product
            $table->integer('by_quantity'); // Quantity of by-product
            $table->decimal('base_quantity', 11, 3)->default(0.000); // Base quantity with 3 decimal precision
            $table->timestamps(); // Created at and updated at timestamps
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
        Schema::dropIfExists('bom_by_product_details');
    }
};
