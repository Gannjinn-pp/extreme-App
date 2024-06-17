<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use app\Models\Home;
use app\Models\Reservation;
use App\Policies\HomePolicy;
use app\Policies\ReservationPolicy;

class AppServiceProvider extends ServiceProvider
{

    protected $policies = [
        Home::class => HomePolicy::class,
        Reservation::class => ReservationPolicy::class,
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
