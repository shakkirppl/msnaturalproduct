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
        Schema::table('stores', function (Blueprint $table) {
            //
            $table->string('logo')->nullable()->after('created_by');  // Store logo path, nullable
            $table->string('email')->nullable()->after('logo');  // Store email, nullable
            $table->string('contact_no', 15)->nullable()->after('email');  // Contact number, nullable, with max length 15
            $table->string('whatsapp_no', 15)->nullable()->after('contact_no');  // WhatsApp number, nullable, with max length 15
            $table->text('address')->nullable()->after('whatsapp_no');  // Store address, nullable, using text for longer addresses
            $table->string('town')->nullable()->after('address');  // Town, nullable
            $table->string('landmark')->nullable()->after('town');  // Land
            $table->string('admin_user_name')->nullable()->after('landmark');  // Admin username, nullable
            $table->string('password')->nullable()->after('admin_user_name');  // Password, nullable
            $table->text('description')->nullable()->after('password');  // Store description, nullable
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stores', function (Blueprint $table) {
            //
        });
    }
};
