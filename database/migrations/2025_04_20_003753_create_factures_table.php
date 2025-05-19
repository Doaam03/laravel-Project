<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_factures_table.php
public function up(): void
{
    Schema::create('factures', function (Blueprint $table) {
        $table->id();
        $table->string('numero_facture')->unique();
        $table->date('date_facture');
        $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
        $table->string('mode_paiement'); // espece, cheque, effet, virement
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factures');
    }
};
