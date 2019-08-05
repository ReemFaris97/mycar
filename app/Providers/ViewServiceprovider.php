<?php

namespace App\Providers;

use App\Chat;
use Illuminate\Support\ServiceProvider;

class ViewServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function ($view){

            $webChannel = Chat::whereUserId(auth()->id())->first();
            $view->with(compact('webChannel'));
        });

    }
}
