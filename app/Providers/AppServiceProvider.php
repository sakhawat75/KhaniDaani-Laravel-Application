<?php

namespace App\Providers;

use \App\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema; //Import Schema

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);


	    view()->composer('*', function($view)
	    {
		    if (Auth::check()) {
			    $id = auth()->id();
			    $profile = Profile::where('user_id', $id)->first();
			    $view->with('profile', $profile);
		    }else {
			    $view->with('profile', null);
		    }
	    });

	    view()->composer( 'layouts.index', function ( $view ){
			$view->with('dishes', \App\Dish::latestDishes(6));
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
