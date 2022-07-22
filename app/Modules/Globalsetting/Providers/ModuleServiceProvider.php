<?php

namespace App\Modules\Globalsetting\Providers;

use App\Modules\Globalsetting\Repositories\SettingInterface;
use App\Modules\Globalsetting\Repositories\SettingRepositories;
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
        $this->loadTranslationsFrom(module_path('globalsetting', 'Resources/Lang', 'app'), 'globalsetting');
        $this->loadViewsFrom(module_path('globalsetting', 'Resources/Views', 'app'), 'globalsetting');
        $this->loadMigrationsFrom(module_path('globalsetting', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('globalsetting', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('globalsetting', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->settingRegister();
    }

    public function settingRegister()
    {
        $this->app->bind(SettingInterface::class, SettingRepositories::class);
    }
}
