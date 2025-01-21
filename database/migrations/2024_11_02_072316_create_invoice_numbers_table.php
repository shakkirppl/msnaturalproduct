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
        Schema::create('invoice_numbers', function (Blueprint $table) {
            $table->id();
            $table->string('bill_type', 255)->nullable(); // Bill type
            $table->string('bill_mode', 255)->nullable(); // Bill mode
            $table->integer('bill_no')->default(0); // Bill number
            $table->string('bill_prefix', 255)->nullable(); // Bill prefix
            $table->unsignedBigInteger('store_id')->default(0); // Store ID
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_numbers');
    }
};
