<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Job;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_listings', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->decimal("salary");//Default 8 numbers, with 2 used for decimal: 999,999.99
            $table->timestamp("created_at")->useCurrent();//Will have the current timestamp on creation
            $table->timestamp("updated_at")->useCurrent();//Will also change the timestamp when updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_listings');
    }
};
