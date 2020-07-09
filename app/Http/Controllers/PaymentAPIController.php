<?php

namespace App\Http\Controllers;


use App\Constants\TransactionStatus;
use App\Http\Requests\GetTransactionRequest;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\SessionRequest;
use App\Models\PaymentSession;
use App\Models\Transaction;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

/**
 * Class PaymentAPIController
 * @package App\Http\Controllers
 */
class PaymentAPIController extends Controller
{
    /**
     * Create payment session
     * @param SessionRequest $request
     * @return string
     */
    public function createSessionID(SessionRequest $request)
    {
        $sum = $request->get('sum');
        $paymentDetails = $request->get('details');
        $sessionId = Str::random(50);

        PaymentSession::create([
            'sum' => $sum,
            'details' => $paymentDetails,
            'sessionId' => $sessionId
        ]);

        session(['sessionId' => $sessionId]);
        Session::save();

        return $this->responseOk([
            'sessionId' => $sessionId
        ]);
    }

    /**
     * Create transaction
     * @param PaymentRequest $request
     * @throws Exception
     * @return string
     */
    public function pay(PaymentRequest $request)
    {
        $card_number = $request->get('card_number');

        if(!$this->is_valid_card($card_number)){
            $this->ThrowException('Card number is wrong');
        }
        //Compare saved session ID with received session ID
        if($request->get('sessionId') != session('sessionId')){
            $this->ThrowException('The session finished or wrong sessionId');
        }
        $session = PaymentSession::where('sessionId',$request->get('sessionId'))->first();

        //Check if session is already used
        if(Transaction::where('session_id',$session->id)->first()){
            $this->ThrowException('This session is already used');
        }

        Transaction::create([
            'card_number' => $card_number,
            'cvc' => $request->get('cvc'),
            'dates' => $request->get('dates'),
            'status' => TransactionStatus::SUCCESS,
            'session_id' => $session->id
        ]);
        return $this->responseOk('Транзакция прошла успешно!');
    }

    /**
     * Check if card number is valid by Luhn algorithm
     * @param $number
     * @return boolean
     */
    private function is_valid_card($number) {

        $number=preg_replace('/\D/', '', $number);

        $number_length=strlen($number);
        $parity=$number_length % 2;

        //Calculating total sum
        $total=0;
        for ($i=0; $i<$number_length; $i++) {
            $digit=$number[$i];
            if ($i % 2 == $parity) {
                $digit*=2;
                if ($digit > 9) {
                    $digit-=9;
                }
            }
            $total+=$digit;
        }

        return ($total % 10 == 0);

    }

    /**
     * Get transaction during received period
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransactions(GetTransactionRequest $request)
    {
        $dateFrom = new Carbon(str_replace('/','.',$request->get('from')).' 00:00:00');
        $dateTo = new Carbon(str_replace('/','.',$request->get('to')).' 23:59:59');
        $transactions = Transaction::whereBetween('created_at',[$dateFrom,$dateTo])->get();
        return $this->responseOk($transactions);

    }

}
