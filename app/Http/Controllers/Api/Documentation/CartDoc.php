<?php

namespace App\Http\Controllers\Api\Documentation;

/**
 * @OA\Schema(
 *     schema="CartRequest",
 *     required={"book_id", "quantity"},
 *     @OA\Property(property="book_id", type="integer", example=1),
 *     @OA\Property(property="quantity", type="integer", example=2),
 * )
 *
 * @OA\Schema(
 *     schema="CartUpdateRequest",
 *     required={"quantity"},
 *     @OA\Property(property="quantity", type="integer", example=3),
 * )
 *
 * @OA\Schema(
 *     schema="CartResponse",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="user_id", type="integer", example=1),
 *     @OA\Property(property="book_id", type="integer", example=1),
 *     @OA\Property(property="quantity", type="integer", example=2),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(
 *         property="book",
 *         type="object",
 *         ref="#/components/schemas/BookResponse"
 *     ),
 * )
 */
class CartDoc
{
    /**
     * @OA\Get(
     *     path="/cart",
     *     operationId="getCartItems",
     *     tags={"Cart"},
     *     summary="Get cart items",
     *     description="Returns all cart items for authenticated user",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/CartResponse")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     )
     * )
     */
    public function index() {}

    /**
     * @OA\Post(
     *     path="/cart",
     *     operationId="addToCart",
     *     tags={"Cart"},
     *     summary="Add item to cart",
     *     description="Adds a new item to cart and returns it",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Item added to cart successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CartResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store() {}

    /**
     * @OA\Put(
     *     path="/cart/{id}",
     *     operationId="updateCartItem",
     *     tags={"Cart"},
     *     summary="Update cart item",
     *     description="Updates quantity of cart item and returns it",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the cart item",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/CartUpdateRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cart item updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/CartResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Cart item doesn't belong to user"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart item not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/cart/{id}",
     *     operationId="removeFromCart",
     *     tags={"Cart"},
     *     summary="Remove item from cart",
     *     description="Removes item from cart and returns success message",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the cart item",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Cart item removed successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Item removed from cart successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Cart item doesn't belong to user"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Cart item not found"
     *     )
     * )
     */
    public function destroy() {}
}
