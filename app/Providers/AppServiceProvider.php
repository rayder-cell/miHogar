<?php

namespace App\Providers;

use App\Auth\CustomUserProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Auth::provider('custom', function ($app, array $config) {
            return new CustomUserProvider(
                $app['hash'],
                $config['model']
            );
        });
    }
}