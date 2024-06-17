<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Models\Home;
use app\Models\Reservation;
use App\Policies\HomePolicy;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        Home::class => HomePolicy::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
