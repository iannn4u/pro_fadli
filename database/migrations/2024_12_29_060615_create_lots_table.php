<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->id("id_lot");
            $table->string("name_user");
            $table->string("username_user");
            $table->string("name_lot");
            $table->boolean("lot1");
            $table->boolean("lot2");
            $table->boolean("lot3");
            $table->boolean("lot4");
            $table->boolean("lot5");
            $table->boolean("lot6");
            $table->boolean("lot7");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lots');
    }
};