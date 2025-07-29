<?php

use App\Models\Employer;
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
            //$table->unsignedBigInteger("employer_id");
            $table->foreignIdFor(Employer::class);//Pass 2 argument to specify column name
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("job_listings", function(Blueprint $table){
            $table->dropForeignIdFor(Employer::class);
        });
    }
};
