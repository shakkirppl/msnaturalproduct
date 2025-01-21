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
            // Add the new fields to the orders table
            $table->string('last_name')->after('first_name'); // Example field for last name
            $table->string('phone_number')->after('last_name'); // Example field for phone number
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
            // Drop the fields if rolling back
            $table->dropColumn(['last_name', 'phone_number']);
        });
    }
};
