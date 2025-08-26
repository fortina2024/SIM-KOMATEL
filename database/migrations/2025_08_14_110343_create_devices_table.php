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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->index()->unique();
            $table->string('marque')->nullable();
            $table->string('imei')->unique();
            $table->string('numero_serie')->nullable()->unique();
            $table->boolean('active')->default(true)->index();
            $table->foreignId('type_device_id')->nullable()->constrained('type_devices')->nullOnDelete();
            $table->foreignId('parc_de_sim_id')->nullable()->unique()->constrained('parc_de_sims')->nullOnDelete();
            $table->date('date_mise_en_service_device')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};
