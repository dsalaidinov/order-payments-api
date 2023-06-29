<?php

namespace App\Services;

use App\Services\Interfaces\RecurringPaymentServiceInterface;
use WayForPay\SDK\Collection\ProductCollection;
use WayForPay\SDK\Domain\Transaction;
use WayForPay\SDK\Domain\Product;
use WayForPay\SDK\Wizard\RegularWizard;

class RecurringPaymentServiceForWayforpay implements RecurringPaymentServiceInterface
{
    private $merchantAccount;
    private $orderReference;

    public function __construct($merchantAccount, $orderReference)
    {
        $this->merchantAccount = $merchantAccount;
        $this->orderReference = $orderReference;
    }

    public function createSubscription($orderId, $amount, $currency, $recToken)
    {
        // Создание объекта RegularTransaction
        $regularTransaction = new Transaction();

        // Установка обязательных параметров
        $regularTransaction
            ->setOrderReference($orderId) // Уникальный идентификатор заказа
            ->setAmount($amount) // Сумма платежа
            ->setCurrency($currency) // Валюта платежа
            ->setComment('Regular payment') // Комментарий к платежу
            ->setOrderDate(time()) // Дата заказа в формате Unix timestamp
            ->setMerchantAccount('YOUR_MERCHANT_ACCOUNT') // Идентификатор мерчанта в системе WayForPay
            ->setRecToken($recToken); // Токен рекуррентного платежа


        // Инициализация Wizard и создание платежа
        $regularWizard = new RegularWizard($regularTransaction);
        $paymentUrl = $regularWizard->getRequestUrl();

        // Вернуть URL для перехода к платежу
        return $paymentUrl;
    }

    public function setRecurringPayment($paymentData)
    {
        // Логика установки рекуррентного платежа для Wayforpay
    }

    public function cancelRecurringPayment($subscriptionId)
    {
        // Логика отмены рекуррентного платежа для Wayforpay
    }

    public function processRecurringPayments()
    {
        // Логика обработки рекуррентных платежей для Wayforpay    
    }
}