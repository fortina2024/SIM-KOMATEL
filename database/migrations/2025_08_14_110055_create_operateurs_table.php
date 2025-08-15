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
            $table->string('nom')->index(); // Nom complet
            $table->string('telephone', 20)->nullable()->index(); // Tel avec index pour recherches rapides
            $table->string('email')->nullable()->unique(); // Email unique
            $table->string('adresse')->nullable();
            $table->string('identifiant', 50)->unique(); // Code unique pour l'opérateur
            $table->boolean('actif')->default(true)->index(); // Statut
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
