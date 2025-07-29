<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Job;
use App\Models\Tag;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("tags", function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->timestamps();
        });

        Schema::create("job_tag", function(Blueprint $table){
            $table->id();
            $table->foreignIdFor(Job::class, "job_listing_id")->constrained()->cascadeOnDelete();//constrained create foreign key constraint
            $table->foreignIdFor(Tag::class)->constrained()->cascadeOnDelete();//When tag is deleted, also deletes the record in job_tag
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("tags");
        Schema::dropIfExists("job_tag");
    }
};
