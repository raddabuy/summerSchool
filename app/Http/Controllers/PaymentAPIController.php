<?php

namespace App\Http\Controllers;


use App\Constants\TransactionStatus;
use App\Http\Requests\PaymentRequest;
use App\Http\Requests\SessionRequest;
use App\Models\PaymentSession;
use App\Models\Transaction;
use Exception;
use Illuminate\Http\Request;
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

//        dd(session('sessionId'));
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
        $session = PaymentSession::where('sessionId',$request->get('sessionId'))->first();

//        session(['sessionId' => 'wsvfbc']);

        dd(session('sessionId'));

        //Check if session exists
        if(!$session){
            $error = new Exception('This session doesn\'t exist' , 422);

            throw $error;
        }
        //Check if session is already used
        if(Transaction::where('session_id',$session->id)->first()){
            $error = new Exception('This session is already used', 422);

            throw $error;
        }

        Transaction::create([
            'card_number' => $request->get('card_number'),
            'cvc' => $request->get('cvc'),
            'dates' => $request->get('dates'),
            'status' => TransactionStatus::SUCCESS,
            'session_id' => $session->id
        ]);
        return $this->responseOk('Транзакция прошла успешно!');
    }


}
