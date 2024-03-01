<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\View\Components\Alert;
use App\View\Components\Inputs\Button;
// use App\View\Components\Forms\Button as FormButton;


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
        Blade::if('env', function ($value) {
            if (config('app.env')===$value){
                return true;
            }
            return false;
        });

        Blade::component('package-alert', Alert::class);
        // Blade::component('button', Button::class);
        // Blade::component('form-button', Button::class);


    }
}