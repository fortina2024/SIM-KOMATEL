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
        Schema::create('affectation_sims', function (Blueprint $table) {
            $table->id();
            $table->date('date_installation')->nullable();
            $table->date('date_mise_en_service')->nullable();
            $table->date('date_desinstallation')->nullable();
            $table->foreignId('parc_de_sim_id')->constrained('parc_de_sims')->cascadeOnDelete();
            $table->foreignId('device_id')->constrained('devices')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affectation_sims');
    }
};
