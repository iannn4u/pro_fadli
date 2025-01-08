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
            $table->string("name_made");
            $table->string("role_made");
            $table->string("name_change");
            $table->string("role_change");
            $table->string("name_lot");
            $table->string("case1");
            $table->string("case2");
            $table->string("case3");
            $table->string("case4");
            $table->string("case5");
            $table->string("case6");
            $table->string("case7");
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
