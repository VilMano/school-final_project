<?php

namespace App\Providers;

use App\Level;
use Illuminate\Support\ServiceProvider;

class LevelsProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('levels_array', Level::all());
        });
    }
}