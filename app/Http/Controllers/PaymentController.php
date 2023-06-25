<?php

namespace App\Http\Controllers;

use App\PaymentGateways\PaymentGatewayInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentGateway;

    public function __construct(PaymentGatewayInterface $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    public function createPaymentForm(Request $request)
    {
        // Получить параметры из запроса
        $clientId = $request->input('clientId');
        $amount = $request->input('amount');
        $currency = $request->input('currency');
        $description = $request->input('description');

        // Генерация уникального идентификатора формы оплаты
        $invoiceId = uniqid();
        
        // Формирование URL-адреса перенаправления
        $redirectUrl = config('app.url') . '/payment/' . $invoiceId;
        
        // Вернуть ответ с информацией о созданной форме оплаты
        return response()->json([
            'invoiceId' => $invoiceId,
            'redirectUrl' => $redirectUrl,
            'status' => 'new',
        ]);
    }

    public function showPaymentForm(Request $request)
    {
        return view('main');
    }
}