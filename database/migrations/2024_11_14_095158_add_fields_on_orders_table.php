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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('city')->after('country_id'); // Place 'city' after 'country_id' or another relevant column
            $table->string('state')->after('city'); // Place 'state' after 'city'
            $table->string('landmark')->after('state'); // Place 'landmark' after 'state'
            $table->string('pincode')->after('landmark'); // Place 'pincode' after 'landmark'
            $table->string('shipping')->after('pincode'); // Place 'shipping' after 'pincode'
            $table->string('payment_type')->after('shipping'); // Place 'payment_type' after 'shipping'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['city', 'state', 'landmark', 'pincode', 'shipping', 'payment_type']);
        });
    }
};
