<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\PaymentGateways\PaymentGatewayInterface;
use App\PaymentGateways\WayforpayGateway;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentGatewayInterface::class, WayforpayGateway::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
