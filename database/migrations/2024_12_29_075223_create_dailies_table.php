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
        Schema::create('dailies', function (Blueprint $table) {
            $table->id("id_daily");
            $table->unsignedBigInteger('id_lot');
            $table->string('name_user');
            $table->string('username_user');
            $table->string('date_daily');
            $table->string("status")->default("Not Available");
            $table->timestamps();
            $table->foreign('id_lot')->references('id_lot')->on('lots')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dailies');
    }
};
