<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_clients_table.php
public function up(): void
{
    Schema::create('clients', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('type_client'); // 'particulier' ou 'entreprise'
        $table->string('telephone')->nullable();
        $table->string('email')->nullable();
        $table->string('ICE')->nullable(); // Null si particulier
        $table->string('IF')->nullable();  // Null si particulier
        $table->timestamps();
    });
    
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
