<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->decimal('prix_ht', 12, 2)->change();
        });

        Schema::table('facture_articles', function (Blueprint $table) {
            $table->decimal('prix_ht', 12, 2)->change();
        });
    }

    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            $table->decimal('prix_ht', 10, 2)->change();
        });

        Schema::table('facture_articles', function (Blueprint $table) {
            $table->decimal('prix_ht', 10, 2)->change();
        });
    }
};
