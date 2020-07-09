<?php

namespace App\Http\Swagger;

abstract class PaymentAPIController
{
    /**
     * @OA\Info(title="LawApp", version="1.0")
     */

    /**
     * @OA\Post(
     *     path="/api/v1/session/create",
     *      description="Create payment session",
     *     tags={"Session"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="Сумма платежа",
     *                     property="sum",
     *                     type="numeric"
     *                 ),
     *                 @OA\Property(
     *                     description="Назначение платежа",
     *                     property="details",
     *                     type="string"
     *                 ),
     *              required={"sum", "details"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *     response="200",
     *      description="Create payment session",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "success": "true",
     *                         "data": {
     *                              {
     *                              "sessionId" : "string",
     *                              }
     *                          }
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    abstract public function createSessionId();


    /**
    * @OA\Post(
     *     path="/api/v1/pay",
     *      description="Create transaction",
     *     tags={"Transaction"},
     *          *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 @OA\Property(
     *                     description="Номер карты (4111 1111 1111 1234)",
     *                     property="card_number",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     description="CVV/CVC (111)",
     *                     property="cvc",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     description="Срок действия карты (01/11)",
     *                     property="dates",
     *                     type="string"
     *                 ),
     *                 @OA\Property(
     *                     description="Session ID",
     *                     property="sessionId",
     *                     type="string"
     *                 ),
     *              required={"sum", "details"}
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *     response="200",
     *      description="Create payment session",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "success": "true",
     *                         "data": "Транзакция прошла успешно!"
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    abstract public function pay();


}
