<?php namespace Tests;


use App\Models\PaymentSession;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

trait ApiTestTrait
{
    private $response;

    private function getTestSessionId(){
        $sessionId = Str::random(50);
        PaymentSession::create([
            'sum' => 1000,
            'details' => "test payment",
            'sessionId' => $sessionId
        ]);
        session(['sessionId' => $sessionId]);
        Session::save();


        return $sessionId;
    }


}
