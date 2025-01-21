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
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('billing_option')->nullable();
            $table->string('billing_first_name')->nullable();
            $table->string('billing_second_name')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_phone')->nullable();
            $table->string('billing_city')->nullable();
            $table->string('billing_state')->nullable();
            $table->string('billing_post_code')->nullable();
            $table->unsignedBigInteger('billing_country_id')->nullable();
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
            $table->dropColumn([
                'email', 
                'address', 
                'billing_option',
                'billing_first_name',
                'billing_second_name',
                'billing_address',
                'billing_phone',
                'billing_city',
                'billing_state',
                'billing_post_code',
                'billing_country_id',
            ]);
        });
    }
};
