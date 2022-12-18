<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  App\Models\notification;
use Auth;
use View;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use App\Models\City;
use App\Models\Ville;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { 
         Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
            $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
            return new LengthAwarePaginator(
                $this->forPage($page, $perPage),
                $total ?: $this->count(),
                $perPage,
                $page,
                [
                    'path' => LengthAwarePaginator::resolveCurrentPath(),
                    'pageName' => $pageName,
                ]
            );
        });
        if(app()->runningInConsole()) {
return;
} 
$villes = Ville::all();
        $cities = City::all();
view::share('cities', $cities);
view::share('villes', $villes);

       
        $auth = $this->app['auth'];

               view()->composer('*', function ($view) use($auth) { 

              if($auth->user()){
                $notifications = notification::Where('user_id',$auth->user()->id)->orWhere('user_id',null)->get();

                 $notifications = $notifications->sortByDesc('updated_at')->values()->all();
                
               View::share('notifications', $notifications);

       
       }
                });


    }
}
