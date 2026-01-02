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
        Schema::create('paiements', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mission_id')->constrained('missions')->onDelete('cascade');
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('executant_id')->constrained('users')->onDelete('cascade');

            $table->decimal('montant', 10, 2);

            $table->decimal('commission_pourcentage', 5, 2)->default(10); 
            $table->decimal('commission_montant', 10, 2)->nullable();    

            $table->decimal('montant_net', 10, 2)->nullable();
            $table->enum('status', ['en_attente', 'payer', 'refuser'])->default('en_attente');
            $table->boolean('liberable')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paiements');
    }
};
