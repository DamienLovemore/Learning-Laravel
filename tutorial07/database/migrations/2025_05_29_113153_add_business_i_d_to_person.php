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
        //php artisan migrate --pretend //Pretend it is going to run, but just show the queries it is going to use
        Schema::table('people', function (Blueprint $table) {
            $table->integer("business_id")->nullable();
            //Index é para botar filtrar melhor
            //Padrão de nomes: tabela_coluna_index
            $table->index("business_id");
            $table->foreign("business_id")->references("id")->on("businesses");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('people', function (Blueprint $table) {
            $table->dropForeign("people_business_id_foreign");
            $table->dropIndex("people_business_id_index");
            $table->dropColumn("business_id");
        });
    }
};
