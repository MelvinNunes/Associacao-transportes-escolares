<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

    public function register()
    {
    }
    public function boot()
    {
        View::composer('navbar', function ($view) {
            $user = auth()->user();
            $view->with('user', User::all());
        });
    }
}
