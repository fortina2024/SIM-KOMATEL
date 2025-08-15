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
        Schema::create('sims', function (Blueprint $table) {
            $table->id();
            $table->string('msisdn')->unique()->index();
            $table->string('iccid')->nullable()->unique();
            $table->string('bundel')->nullable();
            $table->boolean('active')->default(true);
            $table->foreignId('profil_sim_id')->constrained('profils_sims')->cascadeOnDelete();
            $table->foreignId('operateur_id')->nullable()->constrained('operateurs')->nullOnDelete();
            $table->foreignId('zone_operation_id')->nullable()->constrained('zone_operations')->nullOnDelete();
            $table->date('date_activation')->nullable();
            $table->date('date_expiration')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sims');
    }
};
