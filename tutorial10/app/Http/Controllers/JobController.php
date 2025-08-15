<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorejobRequest;
use App\Http\Requests\UpdatejobRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;


class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Variables
        $all_jobs           = Job::with(["employer", "tags"])->get()->groupBy("featured");//With = eager loading, avoid N + 1 problem
        $jobs               = $all_jobs[0]->sortByDesc("created_at");//All non featured jobs
        $featured_jobs      = $all_jobs[1]->sortByDesc("created_at");//All featured jobs
        $tags               = Tag::all();

        //Data to pass (compact creates and array with the variables ass value, and a key in the array with the variable name)
        $data = compact("tags", "jobs", "featured_jobs");

        return view("jobs.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            "title"     => ["required"],
            "salary"    => ["required"],
            "location"  => ["required"],
            "schedule"  => ["required", Rule::in(['Part Time', 'Full Time'])],
            "url"       => ["required", "active_url"],
            "featured"  => ["nullable"],
            "tags"      => ["nullable"]
        ]);

        //Stores a boolean if it marked the featured option or not
        $attr["featured"] = $request->has("featured");

        //Gets the authenticated user, them the employer related to it, and the list of jobs it adds a new one.
        $job = Auth::user()->employer->jobs()->create(Arr::except($attr, "tags"));

        //If it is nullish them returns false
        if($attr["tags"] ?? false)
        {
            $tag_list = explode(",", $attr["tags"]);
            foreach ($tag_list as $tag)
            {
                //Attaches the tag to this job (If it does not exist, them creates it)
                $job->tag($tag);
            }
        }

        return redirect(route("home"));
    }
}
