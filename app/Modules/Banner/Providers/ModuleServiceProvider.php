<?php

namespace App\Modules\Banner\Providers;

use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Banner\Repositories\BannerRepository;
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
        $this->loadTranslationsFrom(module_path('banner', 'Resources/Lang', 'app'), 'banner');
        $this->loadViewsFrom(module_path('banner', 'Resources/Views', 'app'), 'banner');
        $this->loadMigrationsFrom(module_path('banner', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('banner', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('banner', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->bannerRegister();
    }

    public function bannerRegister()
    {
        $this->app->bind(BannerInterface::class, BannerRepository::class);
    }

}
