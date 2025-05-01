<?php

namespace App\Http\Controllers\Api\Documentation;

/**
 * @OA\Schema(
 *     schema="BookRequest",
 *     required={"title", "author", "description", "price", "category_id", "slug"},
 *     @OA\Property(property="title", type="string", example="The Great Gatsby"),
 *     @OA\Property(property="author", type="string", example="F. Scott Fitzgerald"),
 *     @OA\Property(property="description", type="string", example="A novel about the American Dream"),
 *     @OA\Property(property="price", type="number", format="float", example=29.99),
 *     @OA\Property(property="category_id", type="integer", example=1),
 *     @OA\Property(property="slug", type="string", example="the-great-gatsby"),
 * )
 *
 * @OA\Schema(
 *     schema="BookResponse",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="The Great Gatsby"),
 *     @OA\Property(property="author", type="string", example="F. Scott Fitzgerald"),
 *     @OA\Property(property="description", type="string", example="A novel about the American Dream"),
 *     @OA\Property(property="price", type="number", format="float", example=29.99),
 *     @OA\Property(property="category_id", type="integer", example=1),
 *     @OA\Property(property="slug", type="string", example="the-great-gatsby"),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2023-01-01T00:00:00.000000Z"),
 *     @OA\Property(
 *         property="category",
 *         type="object",
 *         ref="#/components/schemas/CategoryResponse"
 *     ),
 * )
 */
class BookDoc
{
    /**
     * @OA\Get(
     *     path="/books",
     *     operationId="getBooksList",
     *     tags={"Books"},
     *     summary="Get list of books",
     *     description="Returns list of books",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/BookResponse")
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
     * @OA\Get(
     *     path="/books/{slug}",
     *     operationId="getBookBySlug",
     *     tags={"Books"},
     *     summary="Get book by slug",
     *     description="Returns a specific book",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Slug of the book",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful operation",
     *         @OA\JsonContent(ref="#/components/schemas/BookResponse")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     )
     * )
     */
    public function show() {}

    /**
     * @OA\Post(
     *     path="/books",
     *     operationId="storeBook",
     *     tags={"Books"},
     *     summary="Store new book",
     *     description="Stores a new book and returns it",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BookRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Book created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/BookResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Admin only",
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
     *     path="/books/{slug}",
     *     operationId="updateBook",
     *     tags={"Books"},
     *     summary="Update existing book",
     *     description="Updates an existing book and returns it",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Slug of the book",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/BookRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/BookResponse")
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Admin only",
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
    public function update() {}

    /**
     * @OA\Delete(
     *     path="/books/{slug}",
     *     operationId="deleteBook",
     *     tags={"Books"},
     *     summary="Delete existing book",
     *     description="Deletes a book and returns success message",
     *     security={{"bearerAuth":{}}},
     *     @OA\Parameter(
     *         name="slug",
     *         in="path",
     *         description="Slug of the book",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Book deleted successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Book deleted successfully")
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *         response=403,
     *         description="Unauthorized - Admin only",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Book not found"
     *     )
     * )
     */
    public function destroy() {}
}
