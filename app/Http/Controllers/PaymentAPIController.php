<?php

namespace App\Http\Controllers;


use App\Http\Requests\SessionRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class PaymentAPIController
 * @package App\Http\Controllers
 */
class PaymentAPIController extends Controller
{
    /**
     * Create session payment
     *
     * @param SessionRequest $request
     *
     * @return mixed
     */
    public function createSessionID(SessionRequest $request)
    {
        $sum = $request->get('sum');
        $paymentDetails = $request->get('details');
        $sessionId = Str::random(50);

        Session::create([
            'sum' => $sum,
            'details' => $paymentDetails,
            'sessionId' => $sessionId
        ]);
        return $this->responseOk([
            'sessionId' => $sessionId
        ]);
    }


}
