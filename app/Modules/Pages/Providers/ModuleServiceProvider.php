<?php

namespace App\Modules\Pages\Providers;

use App\Modules\Pages\Repositories\PagesInterface;
use App\Modules\Pages\Repositories\PagesRepositories;
use App\Modules\Pages\Repositories\PageTypeInterface;

use App\Modules\Pages\Repositories\PageTypeRepositories;
use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'pages');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'pages');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'pages');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->pageRegister();

    }

    public function pageRegister()
    {
        $this->app->bind(PagesInterface::class, PagesRepositories::class );
    }


}
