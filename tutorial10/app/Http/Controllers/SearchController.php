<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;

class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $search = $request->query("q");
        $jobs   = [];

        if(!empty($search))
            $jobs = Job::with(["employer", "tags"])
                            ->where("title", "ILIKE", "%$search%")
                            ->get();

        $data   = compact("search", "jobs");

        return view("results", $data);
    }
}
