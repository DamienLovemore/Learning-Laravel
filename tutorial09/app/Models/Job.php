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

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        //belongsToMany to do a reference to this class table, you use foreignPivotKey (this case job_id was not found)
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
