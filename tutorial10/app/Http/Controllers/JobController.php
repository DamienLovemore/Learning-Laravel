<?php

namespace App\Http\Controllers;

use App\Models\job;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorejobRequest;
use App\Http\Requests\UpdatejobRequest;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Variables
        $all_jobs           = Job::all()->groupBy("featured");
        $jobs               = $all_jobs[0]->sortByDesc("created_at");//All non featured jobs
        $featured_jobs      = $all_jobs[1];//All featured jobs
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorejobRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatejobRequest $request, job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(job $job)
    {
        //
    }
}
