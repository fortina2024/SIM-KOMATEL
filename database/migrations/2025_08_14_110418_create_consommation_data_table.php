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
        Schema::create('consommation_data', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sim_id')->constrained('sims')->cascadeOnDelete();
            $table->foreignId('device_id')->nullable() ->constrained('devices')->nullOnDelete();
            $table->dateTime('date')->index();  // Date et heure de la consommation
            $table->decimal('volume_mb', 10, 2)->default(0.00); // Volume utilisé en MB
            $table->decimal('volume_total_mb', 12, 2)->nullable(); // Pour suivi cumulative si nécessaire
            $table->string('type', 50)->default('data'); // type de trafic : data, sms, voice (si besoin)          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consommation_data');
    }
};
