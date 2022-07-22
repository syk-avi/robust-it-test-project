<?php

namespace App\Modules\User\Providers;

use App\Modules\User\Repositories\AdminInterface;
use App\Modules\User\Repositories\AdminRepository;
use App\Modules\User\Repositories\PermissionInterface;
use App\Modules\User\Repositories\PermissionRepository;
use App\Modules\User\Repositories\RoleInterface;
use App\Modules\User\Repositories\RoleRepository;
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
        $this->loadTranslationsFrom(module_path('user', 'Resources/Lang', 'app'), 'user');
        $this->loadViewsFrom(module_path('user', 'Resources/Views', 'app'), 'user');
        $this->loadMigrationsFrom(module_path('user', 'Database/Migrations', 'app'));
        if(!$this->app->configurationIsCached()) {
            $this->loadConfigsFrom(module_path('user', 'Config', 'app'));
        }
        $this->loadFactoriesFrom(module_path('user', 'Database/Factories', 'app'));
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
        $this->adminRegister();
        $this->roleRegister();
        $this->permissionRegister();
    }

    public function adminRegister()
    {
        $this->app->bind(AdminInterface::class, AdminRepository::class);
    }
    public function roleRegister()
    {
        $this->app->bind(RoleInterface::class, RoleRepository::class);
    }
    public function permissionRegister()
    {
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
    }
}
