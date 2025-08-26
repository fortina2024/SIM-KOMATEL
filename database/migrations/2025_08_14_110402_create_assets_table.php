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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('marque_asset_id')->constrained('marque_assets')->nullOnDelete();
            $table->string('marque')->index();
            $table->string('model')->nullable();
            $table->string('immatriculation')->unique()->nullable();
            $table->string('numero_flotte')->nullable();
            $table->foreignId('type_asset_id')->nullable()->constrained('type_assets')->nullOnDelete();
            $table->integer('annee_fab')->nullable();
            $table->boolean('actif')->default(true)->index();
            $table->foreignId('device_id')->nullable()->unique()->constrained('devices')->nullOnDelete();
            $table->foreignId('client_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->foreignId('site_client_id')->nullable()->constrained('site_clients')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};
