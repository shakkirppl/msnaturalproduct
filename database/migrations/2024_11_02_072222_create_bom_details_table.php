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
        Schema::create('bom_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Reference to user
            $table->unsignedBigInteger('bom_product_id'); // Reference to BOM product
            $table->unsignedBigInteger('bom_unit'); // BOM unit
            $table->integer('bom_quantity'); // Quantity for BOM
            $table->decimal('base_quantity', 11, 3)->default(0.000); // Base quantity with default
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
        Schema::dropIfExists('bom_details');
    }
};
