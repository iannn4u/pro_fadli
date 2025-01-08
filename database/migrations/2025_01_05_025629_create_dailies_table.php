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
            $table->date('date_daily');
            $table->unsignedBigInteger("id_lot");
            $table->unsignedBigInteger("id_user");
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
