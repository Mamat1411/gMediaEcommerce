<?php

namespace App\Providers;

use Laravel\Sanctum\Sanctum;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('convert', function ($money) {
            return "<?php echo number_format($money, 0, ',', '.'); ?>";
        });
        Paginator::useBootstrapFive();
    }
}
