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
        Schema::create('production_masters', function (Blueprint $table) {
            $table->id();
            $table->string('in_date', 50)->nullable(); // Date entry in varchar
            $table->string('in_time', 50)->nullable(); // Time entry in varchar
            $table->string('invoice_no', 50)->nullable(); // Invoice number
            $table->unsignedBigInteger('product_id'); // Product ID
            $table->integer('unit')->default(0); // Unit
            $table->decimal('quantity', 11, 2)->default(0.00); // Quantity
            $table->integer('no_of_labours')->default(0); // Number of labours
            $table->decimal('shift_hours', 11, 3)->default(0.000); // Shift hours
            $table->decimal('labor_hour_cost', 11, 3)->default(0.000); // Labor hour cost
            $table->decimal('labor_cost', 11, 3)->default(0.000); // Labor cost
            $table->unsignedBigInteger('shift_id')->default(0); // Shift ID
            $table->unsignedBigInteger('user_id'); // User ID
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_masters');
    }
};
