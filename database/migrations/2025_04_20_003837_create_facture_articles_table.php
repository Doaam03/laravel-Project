<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_facture_articles_table.php
public function up(): void
{
    Schema::create('facture_articles', function (Blueprint $table) {
        $table->id();
        $table->foreignId('facture_id')->constrained('factures')->onDelete('cascade');
        $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
        $table->integer('quantite');
        $table->decimal('prix_ht', 10, 2); // prix HT au moment de la facture
        $table->timestamps();
    });
    
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facture_articles');
    }
};
