<?php

namespace App\Http\Controllers\Swagger;

use Illuminate\Routing\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API Doc",
 *     version="1.0"
 * ),
 * @OA\PathItem(
 *     path="/api/"
 * ),
 */
class SwaggerController extends Controller
{
}
