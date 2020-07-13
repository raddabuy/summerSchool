<?php

namespace App\Http\Swagger;

abstract class PaymentAPIController
{
    /**
     * @OA\Info(title="Summer School", version="1.0")
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
     *                              "sessionId" : "string",
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
     *              required={"card_number", "cvc","dates", "sessionId"}
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

    /**
    * @OA\Get(
     *     path="/api/v1/transactions",
     *      description="Get transaction",
     *     tags={"Transaction"},
     *     @OA\Parameter(
     *         description="От (08/07/2020)",
     *         in="query",
     *         name="from",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="До (09/07/2020)",
     *         in="query",
     *         name="to",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Parameter(
     *         description="Token authorization (bearer token)",
     *         in="header",
     *         name="Authorization",
     *         required=true,
     *         @OA\Schema(
     *           type="string",
     *         )
     *     ),
     *     @OA\Response(
     *     response="200",
     *      description="Obtain transactions",
     *         content={
     *             @OA\MediaType(
     *                 mediaType="application/json",
     *                 @OA\Schema(
     *                     example={
     *                         "success": "true",
     *                         "data": {
     *                                  {
     *                                       "id": 1,
     *                                       "card_number": "1234",
     *                                       "cvc": "1234",
     *                                       "dates": "01/24",
     *                                       "status": "1",
     *                                       "session_id": 10,
     *                                       "created_at": "2020-07-08 13:34:53",
     *                                       "updated_at": "2020-07-08 13:34:53"
     *                                   },
     *
*    *                          }
     *                     }
     *                 )
     *             )
     *         }
     *     ),
     * )
     */

    abstract public function getTransactions();


}
