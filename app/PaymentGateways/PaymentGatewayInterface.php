<?php 

namespace App\PaymentGateways;

interface PaymentGatewayInterface
{
    public function createPayment($amount, $description);
    public function handleCallback($request);
}
