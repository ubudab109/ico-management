<?php

namespace App\Providers;

use App\Repositories\Menu\PageInterface;
use App\Repositories\Menu\PageRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(PageInterface::class, PageRepository::class);
        $this->app->bind(UserInterface::class, UserRepository::class);
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
