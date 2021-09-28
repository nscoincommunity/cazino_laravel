<?php
namespace VanguardDK\Http\Controllers\Web\Frontend;

use VanguardDK\Model\PaymentSystem;
use VanguardDK\Payment;
use VanguardDK\User;

/**
 * Class FreeKassaPaymentController
 * @package VanguardDK\Http\Controllers\Web\Frontend
 */
class FreeKassaPaymentController
{
    /**
     * @return string
     */
    public function success()
    {
        if (!isset($_REQUEST['MERCHANT_ID'], $_REQUEST['AMOUNT'], $_REQUEST['MERCHANT_ORDER_ID'], $_REQUEST['SIGN'])) {
            $this->errorLog('Request error' . json_encode($_REQUEST) . ';');

            return 'error';
        }

        /** @var PaymentSystem $paymentSystem */
        $paymentSystem = PaymentSystem::where('type', PaymentSystem::TYPE_FREE_KASSA)->first();
        if ($paymentSystem === null || empty($paymentSystem->getConfigParam('secret_key_2'))) {
            $this->errorLog('Config error;');

            return 'error';
        }

        $merchant_id = $_REQUEST['MERCHANT_ID'];
        $amount = $_REQUEST['AMOUNT'];
        $order_id = $_REQUEST['MERCHANT_ORDER_ID'];
        $secret_key_2 = $paymentSystem->getConfigParam('secret_key_2');
        $sign = md5("$merchant_id:$amount:$secret_key_2:$order_id");
        if ($_REQUEST['SIGN'] !== $sign) {
            $this->errorLog('Sign error;');

            return 'error';
        }
        
        $payment = Payment::find($order_id);
        if ($payment === null) {
            $this->errorLog('Payment error;');

            return 'error';
        }

        $user = User::find($payment->user_id);
        if ($user === null) {
            $this->errorLog('User error;');

            return 'error';
        }

        $payment->update(array('status' => 1));
        $user->update(array(
            'balance' => $user->balance + $payment->summ,
            'count_balance' => $user->count_balance + $payment->summ,
            'count_return' => $user->count_return + $payment->summ
        ));

        return 'success';
    }
    
    public function error()
    {
        $this->errorLog('Freekassa error;');

        return 'error';
    }

    /**
     * @param $message
     */
    private function errorLog($message)
    {
        error_log($message . PHP_EOL, 3, storage_path('logs/freekassa.log'));
    }
}
