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
        Schema::table("job_listings", function(Blueprint $table){
            $table->decimal("salary", 9, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("job_listings", function(Blueprint $table){
            $table->decimal("salary")->change();//O change é para dizer para alterar a coluna, se fosse para apagar usava o $table->dropColumn, para criar é sem o change no final.
        });
    }
};
