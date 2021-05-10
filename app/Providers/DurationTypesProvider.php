<?php

namespace App\Providers;

use App\durationType;
use Illuminate\Support\ServiceProvider;

class DurationTypesProvider extends ServiceProvider
{
    public function boot()
    {
        view()->composer('*', function($view){
            $view->with('duration_types_array', durationType::all());
        });
    }
}