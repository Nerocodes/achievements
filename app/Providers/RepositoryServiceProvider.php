<?php

namespace App\Providers;

use App\Repositories\AchievementRepository;
use App\Repositories\BadgeRepository;
use App\Repositories\Contracts\AchievementRepositoryInterface;
use App\Repositories\Contracts\BadgeRepositoryInterface;
use App\Repositories\Contracts\SaleRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\SaleRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SaleRepositoryInterface::class, SaleRepository::class);
        $this->app->bind(AchievementRepositoryInterface::class, AchievementRepository::class);
        $this->app->bind(BadgeRepositoryInterface::class, BadgeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
