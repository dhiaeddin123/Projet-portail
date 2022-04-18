<?php

namespace App\Providers;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        view()->composer('layouts.header', function($view)
    {
        $categories = Categorie::all();
     //   $user=User::with('role')->find(auth()->user()->id);
        $view->with('categories', $categories);
    });
    }
}
