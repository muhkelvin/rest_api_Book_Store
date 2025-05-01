<?php

namespace App\Http\Controllers\Api\Documentation;

use App\Http\Controllers\Controller;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Book Store API Documentation",
 *      description="API documentation for Book Store application",
 *      @OA\Contact(
 *          email="admin@bookstore.com"
 *      ),
 *      @OA\License(
 *          name="Apache 2.0",
 *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *      )
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Book Store API Server"
 * )
 *
 * @OA\SecurityScheme(
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     securityScheme="bearerAuth",
 * )
 *
 * @OA\Tag(
 *     name="Authentication",
 *     description="API Endpoints for user authentication"
 * )
 * @OA\Tag(
 *     name="Books",
 *     description="API Endpoints for book management"
 * )
 * @OA\Tag(
 *     name="Categories",
 *     description="API Endpoints for category management"
 * )
 * @OA\Tag(
 *     name="Cart",
 *     description="API Endpoints for shopping cart"
 * )
 * @OA\Tag(
 *     name="Payment",
 *     description="API Endpoints for payment management"
 * )
 */
class ApiDocController extends Controller
{
    //
}
