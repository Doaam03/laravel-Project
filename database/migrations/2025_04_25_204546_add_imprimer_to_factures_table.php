<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->boolean('imprimer')->default(false)->after('mode_paiement');
        });
    }
    
    public function down()
    {
        Schema::table('factures', function (Blueprint $table) {
            $table->dropColumn('imprimer');
        });
    }
    
};
