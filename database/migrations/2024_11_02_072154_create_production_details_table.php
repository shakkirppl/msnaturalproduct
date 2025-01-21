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
        Schema::create('production_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_master'); // Reference to BOM master
            $table->unsignedBigInteger('user_id'); // Reference to user
            $table->unsignedBigInteger('bom_product_id'); // Reference to BOM product
            $table->integer('bom_unit'); // Unit of BOM product
            $table->integer('bom_quantity'); // Quantity of BOM product
            $table->integer('bom_actual_quantity')->default(0); // Actual quantity, default is 0
            $table->timestamps(); // Created and updated at timestamps
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
        Schema::dropIfExists('production_details');
    }
};
