<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Directiva para roles
        Blade::directive('role', function ($role) {
            return "<?php if(auth()->check() && auth()->user()->tipo === $role): ?>";
        });

        Blade::directive('endrole', function () {
            return "<?php endif; ?>";
        });

        // Directiva para permisos (si lo necesitas)
        Blade::directive('can', function ($permission) {
            return "<?php if(auth()->check() && auth()->user()->can($permission)): ?>";
        });

        Blade::directive('endcan', function () {
            return "<?php endif; ?>";
        });
    }
}
