<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Volunteer\VolunteerRepository;
use App\Repositories\Volunteer\VolunteerRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(VolunteerRepositoryInterface::class, VolunteerRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
