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
        Schema::create('video_gallaries', function (Blueprint $table) {
            $table->id();
            $table->string('channel')->nullable();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('store_id');
            $table->timestamps();
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
        Schema::dropIfExists('video_gallaries');
    }
};
