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
        Schema::create('states', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('state_name'); // State name
            $table->unsignedBigInteger('country_id'); // Foreign key for countries
            $table->decimal('shipping_charge', 8, 2)->default(0.00); // Shipping charge
            $table->unsignedBigInteger('store_id'); // Store ID
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('states');
    }
};
