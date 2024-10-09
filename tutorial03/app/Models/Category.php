<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //If you have not used Laravel naming convention for tables and models use this to specify table
    protected $table = "categories";
}
