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
        Schema::create('damages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_size_id')->constrained()->onDelete('cascade'); // ID of the damaged product
            $table->foreignId('store_id')->constrained()->onDelete('cascade'); // Store where the damage occurred
            $table->integer('quantity'); // Quantity of damaged product
            $table->text('reason')->nullable(); // Reason for the damage
            $table->timestamp('damage_date')->useCurrent(); // Date of damage
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('damages');
    }
};
