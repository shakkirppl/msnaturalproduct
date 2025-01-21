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
        Schema::create('production_by_product_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bom_master'); // BOM master reference
            $table->unsignedBigInteger('user_id'); // User reference
            $table->unsignedBigInteger('by_product_id'); // By-product reference
            $table->integer('by_unit'); // By-product unit
            $table->integer('by_quantity'); // By-product quantity
            $table->integer('by_actual_quantity')->default(0); // By-product actual quantity
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes(); // Deleted at timestamp for soft del
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_by_product_details');
    }
};
