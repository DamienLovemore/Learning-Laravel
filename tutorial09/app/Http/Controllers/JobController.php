<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

//These types of stuff that must exist across all application must be put in the boot method in AppServiceProvider.php

// Gate::define("logged-in", function(){
//     return Auth::check();
// });

// Gate::define("job-control", function(User $user, Job $job){
//     return $job->employer->user->is($user);
// });

class JobController extends Controller
{
    public function index()
    {
        //https://laravelmagazine.com/differences-between-lazy-loading-and-eager-loading
        $jobs       = Job::with("employer")//Eager Loading with Relationships(Queries count reduced from 22 to 3;Solves N+1 problem)
                        ->latest("updated_at")//Adds an order by clause to a timestamp column(uses by defaults the ->timestamps(), created and updated)
                        ->paginate(20);//Switch to simplePaginate to display numbers of pags, just previous and next buttons. Or cursor paginate to be even more performant(no page in the url)

        $data       = compact("jobs");

        return view("jobs.index", $data);
    }

    public function create()
    {
        //Auth::guest for a not logged in user, Auth::check for a logged one.
        // if(Gate::denies("logged-in"))
        //     return redirect(route("user.index"));

        return view("jobs.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            "title"  => "required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/|min:6|max:50",//\h espaços, a-z letra minúsculas, á... acentos, 0-9 números
            "salary" => ["required", "regex:/^([0-9]+|[0-9]+(\.[0-9]{1,2}))$/"]//Pega números brasileiros (inteiros, ou com casa decimal usando vírgula)
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
            "salary"        => $val_sal,
            "employer_id"   => 1,
        ]);

        return redirect(route("jobs"));//Redirect to the page that shows all jobs
    }

    public function show($p1)
    {
        $id         = (int)base64_decode($p1);
        $job        = Job::findOrFail($id);

        $data       = compact("job");

        return view("jobs.show", $data);
    }

    public function edit($p1)
    {
        $id     = (int)base64_decode($p1);
        $job    = Job::findOrFail($id);

        $data   = compact("job");

        // if(Auth::guest())//If not logged in redirect to login page
        //     return redirect(route("user.index"));
        // else if($job->employer->user->isNot(Auth::user()))//If logged in but not the user that created the jobs then does not allow
        //     abort(403);

        // if(Gate::denies("logged-in"))//denies verify negative of the gate condition, allows verifies as normal
        //     return redirect(route("user.index"));

        //If not authorized runs a 403 error
        // Gate::authorize("job-control", $p1);

        return view("jobs.edit", $data);
    }

    public function update(Request $request, $p1)
    {
        $id     = (int)base64_decode($p1);
        $job    = Job::findOrFail($id);

        //If not authorized runs a 403 error
        // Gate::authorize("job-control", $p1);

        $request->validate([
            "title"  => "required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/|min:6|max:50",//\h espaços, a-z letra minúsculas, á... acentos, 0-9 números
            "salary" => ["required", "regex:/^([0-9]+|[0-9]+(\.[0-9]{1,2}))$/"]//Pega números brasileiros (inteiros, ou com casa decimal usando vírgula)
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

        $job->update([
            "title"     => $request->input("title"),
            "salary"    => $val_sal
        ]);

        return redirect(route("jobs"));
    }

    public function delete($p1)
    {
        $id     = (int)base64_decode($p1);
        $job    = Job::findOrFail($id);

        //If not authorized runs a 403 error
        // Gate::authorize("job-control", $p1);

        $job->delete();

        return redirect(route("jobs"));
    }
}
