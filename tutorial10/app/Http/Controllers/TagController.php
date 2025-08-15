<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show($tag_name)
    {
        if(!empty($tag_name))
        {
            $tag    = Tag::where("name", "=", $tag_name)->firstOrFail();

            return view("tags.show", ["tag" => $tag]);
        }
        else
            abort(404);//Returns one of HTTP errors (For example 404)
    }

    public function getJobs(Tag $tag)
    {
        $search = "Tag " . $tag->name;
        $jobs   = (!empty($tag->jobs)) ? $tag->jobs : [];

        $data   = compact("search", "jobs");

        return view("results", $data);
    }
}
