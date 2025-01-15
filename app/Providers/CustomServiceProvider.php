<?php

namespace App\Providers;

use App\Models\Backend\Account;
use App\Models\Backend\Airport;
use App\Models\Backend\CarCategory;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class CustomServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $account_list = Account::get();
        $job_number_list = rand(100000, 999999);
        $airports_list = Airport::where('status', 1)->get();
        $car_categories_list = CarCategory::where('status', 1)->get(); 

        View::share('job_number_list', $job_number_list);
        View::share('account_list', $account_list);
        View::share('car_categories_list', $car_categories_list); 
        View::share('airports_list', $airports_list); 
    }
}
