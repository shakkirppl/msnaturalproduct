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
        Schema::create('bom_masters', function (Blueprint $table) {
            $table->id();
            $table->string('in_date', 50)->nullable(); // Date entry in varchar format
            $table->integer('unit')->default(0); // Unit ID or count
            $table->string('in_time', 50)->nullable(); // Time entry in varchar format
            $table->string('invoice_no', 50)->nullable(); // Invoice number
            $table->unsignedBigInteger('product_id'); // Product ID
            $table->decimal('quantity', 11, 2)->default(0.00); // Quantity with 2 decimal precision
            $table->unsignedBigInteger('work_center'); // Work center ID
            $table->unsignedBigInteger('user_id'); // User IDe ID
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
        Schema::dropIfExists('bom_masters');
    }
};
