<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Blade;

class PermissionsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return false
     */
    public function boot()
    {
        try {
            Permission::get()->map(function ($permission) {
                Gate::define($permission->slug, function ($user) use ($permission) {
                    return $user->hasPermissionTo($permission);
                });
            });
        } catch (\Exception $e) {
            report($e);
            return false;
        }

        //Blade directives
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->hasRole($role)) : ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });
    }
}
