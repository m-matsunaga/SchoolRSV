<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\Calendar\CalendarView;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    // public function register()
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // View::composer('*', function($view){

        //     $calendar = new CalendarView(time());
        //     $view->with([
        //         "calendar" => $calendar,
        //     ]);

        // });
    }
}
