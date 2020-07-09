<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Symfony\Component\VarDumper\VarDumper;
use Tests\ApiTestTrait;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use ApiTestTrait;
    use DatabaseTransactions;

    /**
     * Тест апи - создание платежной сессии
     */
    public function testCreateSessionTest()
    {

        $response = $this->json('post', '/api/v1/session/create', [
            "sum" => 1000,
            "details" => "test",

        ]);
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

    }

    /**
     * Тест апи - оплата по указанным данным карты
     */
    public function testPaymentTest()
    {

        $response = $this->json('post', '/api/v1/pay', [
            "card_number" => "4111111111111111",
            "cvc" => 111,
            "dates" => "10/10",
            "sessionId" => $this->getTestSessionId(),

        ]);
        VarDumper::dump($response->decodeResponseJson());
        $response->assertStatus(200);
        $response->assertJson(['success' => true]);

    }
}
