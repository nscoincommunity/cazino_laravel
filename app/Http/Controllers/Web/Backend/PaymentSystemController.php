<?php
namespace VanguardDK\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use VanguardDK\Model\PaymentSystem;
use VanguardDK\Model\PaymentTask;

/**
 * Class PaymentSystemController
 * @package VanguardDK\Http\Controllers\Web\Backend
 */
class PaymentSystemController
{
    /**
     * @return \Illuminate\View\View
     */
    public function freeKassa()
    {
        /** @var PaymentSystem $paymentSystem */
        $paymentSystem = PaymentSystem::where('type', PaymentSystem::TYPE_FREE_KASSA)->first();
        if ($paymentSystem === null) {
            $paymentSystem = new PaymentSystem();
            $paymentSystem->type = PaymentSystem::TYPE_FREE_KASSA;
            $paymentSystem->min_amount = 10;
            $paymentSystem->max_amount = 1000;
            $paymentSystem->save();
        }

        return view('backend.payment_system.free_kassa', compact('paymentSystem'));
    }

    /**
     * @return \Illuminate\View\View
     */
    public function giveMoneySettings()
    {
        $paymentSystems = PaymentSystem::where('operation', PaymentSystem::OPERATION_GIVE_MONEY)->get();

        return view('backend.payment_system.give_money', compact('paymentSystems'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validationRules = [
            'operation' => 'required|int',
            'active' => 'bool',
            'type' => 'required|string',
            'min_amount' => 'required|int|min:1',
            'max_amount' => 'required|int|min:1',
        ];

        if (PaymentSystem::TYPE_FREE_KASSA === $request->get('type')) {
            $validationRules = array_merge($validationRules, [
                'config.merchant_url' => [
                    'required',
                    'string',
                    'min:33',
                    'max:255',
                    'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
                ],
                'config.merchant_id' => 'required|int',
                'config.secret_key_1' => 'required|string',
                'config.secret_key_2' => 'required|string',
            ]);
        }

        $request->validate($validationRules);

        /** @var PaymentSystem $paymentSystem */
        $paymentSystem = PaymentSystem::where('type', $request->get('type'))->first();
        if ($paymentSystem === null) {
            $paymentSystem = new PaymentSystem();
            $paymentSystem->type = $request->get('type');
        }

        $paymentSystem->fill($request->all())->save();

        return response()->json(array('success' => 'success'), 200);
    }
}
