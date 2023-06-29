<?php

namespace App\Services\Interfaces;

interface RecurringPaymentServiceInterface
{

    public function createSubscription($orderId, $amount, $currency, $recToken);
    
    public function setRecurringPayment($paymentData);

    public function cancelRecurringPayment($customerId);

    public function processRecurringPayments();
}
