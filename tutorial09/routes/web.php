<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Validation\ValidationException;

Route::get('/', function () {
    $greeting   = __("Hello!");
    $data       = compact("greeting");

    return view('home', $data);
})->name("home");

Route::get("/jobs", function(){
    //https://laravelmagazine.com/differences-between-lazy-loading-and-eager-loading
    $jobs       = Job::with("employer")//Eager Loading with Relationships(Queries count reduced from 22 to 3;Solves N+1 problem)
                    ->latest()//Adds an order by clause to a timestamp column(uses by defaults the ->timestamps(), created and updated)
                    ->paginate(20);//Switch to simplePaginate to display numbers of pags, just previous and next buttons. Or cursor paginate to be even more performant(no page in the url)
    $data       = compact("jobs");

    return view("jobs.index", $data);
})->name("jobs");

Route::get("/jobs/create", function(){
    return view("jobs.create");
})->name("jobs.create");

//Wildcards should generally stick to the bottom
Route::get("/jobs/{p1}", function($p1){
    $id         = (int)base64_decode($p1);
    $job        = Job::find($id);
    $data       = compact("job");

    return view("jobs.show", $data);
})->name("jobs.info");

Route::post("/jobs", function(Request $request){
    $request->validate([
        "title"  => "required|regex:/^[a-zA-Z0-9\h]+$/|min:6|max:50",
        "salary" => ["required", "regex:/^([0-9]+|[0-9]+(\,[0-9]{1,2}))$/"]//Pega números brasileiros (inteiros, ou com casa decimal usando vírgula)
    ]);

    //Verifica se é valido o salário(consegue virar número, e está dentro do mínimo e máximo)
    $val_sal = $request->input("salary", "#");
    $val_sal = (float)str_replace(",", ".", $val_sal);
    if(($val_sal < (1518/2)) || ($val_sal > 1000000))
    {
        $sal_range = [
            "salary" => ["O valor do salário ou está muito baixo ou fora dos limites!"]
        ];
        throw ValidationException::withMessages($sal_range);
    }

    Job::create([
        "title"         => $request->input("title"),
        "salary"        => $request->input("salary"),
        "employer_id"   => 1,
    ]);

    return redirect(route("jobs"));//Redirect to the page that shows all jobs
})->name("jobs.store");

Route::get("/contact", function(){
    $greeting   = __("Hello!");
    $data       = compact("greeting");

    return view("contact", $data);
})->name("contact");
