<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

//AppServiceProvider is used for configuring the aplication as well.(.env and config/* also)
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //boot method is called after all the project dependencies have been loaded
        //Model::preventLazyLoading();

        //Paginator::defaultView("sdsdsdsds.abc");//To change the default view used in the paginator
        //Paginator::useBootstrap();//To change the styling to Bootstrap 4
        //Paginator::useBootstrapFive();//To change the styling to Bootstrap 5
        //Paginator::useTailwind();//To change the styling to Tailwind(It is already the default one)

        Gate::define("logged-in", function(){
            return Auth::check();
        });

        Gate::define("job-control", function(User $user, $p1){
            $id     = (int)base64_decode($p1);
            $job    = Job::find($id);

            return $job->employer->user->is($user);
        });
    }
}
