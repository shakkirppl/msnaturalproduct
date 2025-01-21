<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // id field
            $table->unsignedBigInteger('store_id'); // store_id field
            $table->date('date'); // date field
            $table->decimal('amount', 10, 2); // amount field
            $table->decimal('total_amount', 10, 2); // total_amount field
            $table->decimal('shipping_charge', 10, 2); // shipping_charge field
            $table->unsignedBigInteger('country_id'); // country_id field
            $table->timestamps();

            // Optional: Add foreign keys if necessary
            // $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
            // $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
