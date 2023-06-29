<?php

namespace App\Console;

use App\Services\WayforpayRecurringPaymentService;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        // Добавляем задачу cron job для обработки рекуррентных платежей Wayforpay
        $schedule->call(function () {
            $recurringPaymentService = new WayforpayRecurringPaymentService();
            $recurringPaymentService->processRecurringPayments();
        })->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
