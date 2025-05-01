<?php

namespace App\Http\Controllers\Api\Documentation;

/**
 * @OA\Schema(
 *     schema="PaymentStatusRequest",
 *     required={"cart_id", "status"},
 *     @OA\Property(property="cart_id", type="integer", example=1),
 *     @OA\Property(property="status", type="boolean", example=true),
 * )
 *
 * @OA\Schema(
 *     schema="PaymentStatusResponse",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="cart_id", type="integer", example=1),
 *     @OA\Property(property="status", type="boolean", example=true),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(
 *         property="cart",
 *         type="object",
 *         ref="#/components/schemas/CartResponse"
 *     ),
 * )
 */
class PaymentStatusDoc
{
    /**
     * @OA\Post(
     *     path="/payment",
     *     operationId="createPayment",
     *     tags={"Payment"},
     *     summary="Create payment status",
     *     description="Creates a payment status for a cart item",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/PaymentStatusRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Payment status created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/PaymentStatusResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Cart doesn't belong to user"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart not found"
     *     ),
     *     @OA\Response(
     *         response=409,
     *         description="Cart already has a payment status"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Get(
     *     path="/payment/{id}",
     *     operationId="getPaymentStatus",
     *     tags={"Payment"},
     *     summary="Get payment status",
     *     description="Returns a specific payment status",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the payment status",
     *         required=true,
     *         @OA\Schema(
     *             type="integer"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/PaymentStatusResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Payment doesn't belong to user"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Payment status not found"
     *     )
     * )
     */
    public function show() {}
}
