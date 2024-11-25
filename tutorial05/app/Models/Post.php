<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        "title",
        "content",
        "user_id",
        "thumbnail"
    ];

    //Mark that this model is part of a one to many relationship, being "User" the "one".
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
