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
        Schema::create('status_lots', function (Blueprint $table) {
            $table->id("id_status_lot");
            $table->unsignedBigInteger("id_daily");
            $table->integer("id_lot");
            $table->string("name_case");
            $table->string("name_lot");
            $table->string("name_changed_status")->default('Not Available');
            $table->string("status_lot")->default("Not Change");
            $table->timestamps();
            $table->foreign('id_daily')->references('id_daily')->on('dailies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_lots');
    }
};
