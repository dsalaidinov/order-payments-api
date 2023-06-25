<?php 

namespace App\PaymentGateways;

class WayforpayGateway implements PaymentGatewayInterface
{
    public function createPayment($amount, $description)
    {
        // Логика создания платежа через Wayforpay
    }

    public function handleCallback($request)
    {
        // Логика обработки callback-ответа от Wayforpay
    }

}


