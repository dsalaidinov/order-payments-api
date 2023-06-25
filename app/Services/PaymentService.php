<?php

namespace App\Services;

use App\PaymentGateways\PaymentGatewayInterface;

class PaymentService
{
    protected $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    // Методы для работы с платежами, использующие $this->paymentGateway
}
