<?php
namespace VanguardDK\Http\Controllers\Web\Backend;

use Illuminate\Http\Request;
use VanguardDK\Model\PaymentSystem;
use VanguardDK\Model\PaymentTask;

/**
 * Class PaymentTaskController
 * @package VanguardDK\Http\Controllers\Web\Backend
 */
class PaymentTaskController
{
    /**
     * @return \Illuminate\View\View
     */
    public function giveMoneyTasks()
    {
        $paymentTasks = PaymentTask::with(['user', 'system'])->paginate(10);

        return view('backend.payment_system.give_money_tasks', compact('paymentTasks'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|int',
            'status' => 'int|in:' . implode(',', [PaymentTask::STATUS_ACTIVE, PaymentTask::STATUS_COMPLETED]),
        ]);

        /** @var PaymentTask $paymentSystem */
        $paymentTask = PaymentTask::find($request->get('id'));
        if ($paymentTask === null) {
            return response()->json(array('error' => 'Error'), 422);
        }

        $paymentTask->fill($request->only('status'))->save();

        return response()->json(array('success' => 'success'), 200);
    }
}
