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
        Schema::create('parc_de_sims', function (Blueprint $table) {
            $table->id();
            $table->string('iccid')->nullable()->unique();
            $table->string('msisdn')->unique()->index();
            $table->string('imsi')->nullable();
            $table->boolean('active')->default(true);
            $table->date('date_activation')->nullable();
            $table->date('date_mise_en_service')->nullable();
            $table->foreignId('profil_sim_id')->nullable()->constrained('profils_sims')->cascadeOnDelete();
            $table->foreignId('operateur_id')->nullable()->constrained('operateurs')->nullOnDelete();
            $table->foreignId('bundel_id')->nullable()->constrained('bundels')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parc_de_sims');
    }
};
