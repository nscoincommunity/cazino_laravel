<?php

namespace VanguardDK\Http\Controllers\Web\Frontend;

use Auth;
use Illuminate\Http\Request;
use VanguardDK\Model\PaymentSystem;
use VanguardDK\Model\PaymentTask;

/**
 * Class PaymentSystemController
 * @package VanguardDK\Http\Controllers\Web\Frontend
 */
class PaymentSystemController
{
    public function addTask(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(array('error' => 'Пожалуйста авторизуйтесь'), 403);
        }
        
        $request->validate([
            'operation' => 'required|int',
            'amount' => 'required',
            'type' => 'required|string',
            'account' => 'required|string',
        ]);

        $amount = $request->get('amount');
        if (!is_numeric($amount)) {
            return response()->json(array('error' => 'Сумма должна быть числом'), 422);
        }

        $amount = str_replace(',', '.', trim($amount));
        $amount = number_format(floatval($amount), 2, '.', '');

        /** @var PaymentSystem|null $paymentSystem */
        $paymentSystem = PaymentSystem::where('type', $request->get('type'))
            ->where('operation', $request->get('operation'))
            ->where('active', 1)
            ->first();
        if ($paymentSystem === null) {
            return response()->json(array('error' => 'Платежная система не поддерживается'), 422);
        }

        if ($amount < $paymentSystem->min_amount) {
            return response()->json(['error' => 'Минимальная сумма:' . $paymentSystem->min_amount], 422);
        }
        if ($paymentSystem->max_amount < $amount) {
            return response()->json(['error' => 'Маx. сумма:' . $paymentSystem->max_amount], 422);
        }
        
        $paymentTask = new PaymentTask();
        $paymentTask->user_id = Auth::user()->id;
        $paymentTask->payment_system_id = $paymentSystem->id;
        $paymentTask->amount = $amount;
        $paymentTask->account = $request->get('account');
        $paymentTask->save();

        return response()->json(array('success' => 'success'), 200);
    }
}
