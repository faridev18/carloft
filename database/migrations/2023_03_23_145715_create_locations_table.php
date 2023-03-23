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
        Schema::create('locations', function (Blueprint $table) {
            $table->id("id_loc");
            $table->integer('id_user');
            $table->integer('id_voiture');
            $table->string('date_loc');
            $table->string('rendu')->default(0);
            $table->foreign('id_voiture')->references('id')->on('users');
            $table->foreign('id_voiture')->references('id_voiture')->on('voitures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
