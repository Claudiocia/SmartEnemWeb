<?php

namespace SmartEnem\Providers;

use Illuminate\Support\ServiceProvider;
use SmartEnem\Repositories\CategoryRepository;
use SmartEnem\Repositories\CategoryRepositoryEloquent;
use SmartEnem\Repositories\ContactRepository;
use SmartEnem\Repositories\ContactRepositoryEloquent;
use SmartEnem\Repositories\EventoRepository;
use SmartEnem\Repositories\EventoRepositoryEloquent;
use SmartEnem\Repositories\PublicationRepository;
use SmartEnem\Repositories\PublicationRepositoryEloquent;
use SmartEnem\Repositories\UserRepository;
use SmartEnem\Repositories\UserRepositoryEloquent;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepository::class, UserRepositoryEloquent::class);
        $this->app->bind(CategoryRepository::class, CategoryRepositoryEloquent::class);
        $this->app->bind(EventoRepository::class, EventoRepositoryEloquent::class);
        $this->app->bind(PublicationRepository::class, PublicationRepositoryEloquent::class);

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
