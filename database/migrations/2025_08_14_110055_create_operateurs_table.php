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
        Schema::create('operateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->index();
            $table->string('telephone')->nullable()->index();
            $table->string('email')->nullable()->unique();
            $table->string('pays')->nullable();
            $table->string('identifiant', 100)->unique()->nullable();
            $table->boolean('actif')->default(true)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operateurs');
    }
};
