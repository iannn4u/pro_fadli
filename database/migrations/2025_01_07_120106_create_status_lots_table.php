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
            $table->id('id_status');
            $table->unsignedBigInteger("id_lot");
            $table->unsignedBigInteger("id_daily");
            $table->string("status")->default('Belum Berubah.');
            $table->unsignedBigInteger("changed_by");
            $table->timestamps();

            $table->foreign('changed_by')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('changed_by')->references('id_user')->on('users')->onDelete('cascade');
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
