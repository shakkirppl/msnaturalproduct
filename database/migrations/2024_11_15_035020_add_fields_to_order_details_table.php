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
        Schema::table('order_details', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('id'); // Adjust the position as needed
            $table->unsignedBigInteger('product_size_id')->nullable()->after('product_id');
            $table->unsignedBigInteger('product_prize_id')->nullable()->after('product_size_id');
            $table->string('status')->default('pending')->after('product_prize_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_details', function (Blueprint $table) {
            $table->dropColumn(['product_id', 'product_size_id', 'product_prize_id', 'status']);
        });
    }
};
