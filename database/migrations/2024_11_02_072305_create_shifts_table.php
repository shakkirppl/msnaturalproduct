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
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255); // Name field
            $table->decimal('shift_hours', 11, 2)->default(0.00)->nullable(); // Shift hours field
            $table->decimal('labor_hour_cost', 11, 2)->default(0.00); // Labor hour cost field
            $table->integer('status')->default(1); // Status field, default 1
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
        Schema::dropIfExists('shifts');
    }
};
