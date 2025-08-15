<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory;

    protected $fillable = [
        "title",
        "salary",
        "location",
        "schedule",
        "url",
        "featured",
        "tags"
    ];

    public function employer(): BelongsTo
    {
        return $this->belongsTo(Employer::class);
    }

    public function tag(string $tag): void
    {
        //first or Create tries to get it, it not found creates a new model and save it in the database.
        //firstOrNew created the models but does not save it. ($model->save() is need later to store in the database)
        $tag = Tag::firstOrCreate(["name" => $tag]);

        $this->tags()->attach($tag);//Attaches a new tag into the pivot table (job_tag table)
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
