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
            $table->string('marque')->nullable();//Model
            $table->string('imei')->unique();
            $table->string('serial_number')->nullable()->unique();
            $table->string('type')->nullable();
            $table->foreignId('sim_id')->nullable()->constrained('sims')->nullOnDelete();
            $table->boolean('active')->default(true)->index();
            $table->date('date_achat')->nullable();
            $table->date('date_mise_en_service')->nullable();
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
