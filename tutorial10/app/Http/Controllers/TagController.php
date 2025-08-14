<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($tag_name)
    {
        $tag    = Tag::where("name", "=", $tag_name)->firstOrFail();

        if(!empty($tag_name))
        {
            return view("tags.show", ["tag" => $tag]);
        }
        else
            abort(404);//Returns one of HTTP errors (For example 404)
    }
}
