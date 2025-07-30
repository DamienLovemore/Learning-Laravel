<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory;

    public function jobs()
    {
        //belongsToMany to do a relationship on another class table use relatedPivotKey (job_id does a reference to other table)
        return $this->belongsToMany(Job::class, relatedPivotKey: "job_listing_id");
    }
}
