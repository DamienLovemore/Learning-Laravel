<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory, SoftDeletes;

    protected $with = ["business"];

    //This person belongs to a business (foregin key business -> One to Many)
    public function business()
    {
        return $this->belongsTo(Business::class);
    }
}
