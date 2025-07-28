<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
* Classe que representa a lista de empregos
*/
class Job extends Model
{
    use HasFactory;

    protected $table = "job_listings";//Changes the default table(From default convention it would have searched the jobs table, which already comes with Laravel)

    protected $fillable = ["title", "salary"];
}
