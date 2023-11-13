<?php

namespace App\Http\Controllers\Swagger;

use Illuminate\Routing\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/posts",
 *     summary="Get all posts",
 *     tags={"Post"},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="posts", type="object",
 *                 @OA\Property(property="current_page", type="integer", example=1),
 *                 @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="content", type="string", example="Some content"),
 *                     @OA\Property(property="created_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                     @OA\Property(property="updated_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                     @OA\Property(property="image", type="string", example="/images/phpSeG13H.png"),
 *                 )),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Get(
 *     path="/api/posts/{post}",
 *     summary="Get one post",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         description="Post ID",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="post", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="title", type="string", example="Some title"),
 *                 @OA\Property(property="content", type="string", example="Some content"),
 *                 @OA\Property(property="created_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                 @OA\Property(property="updated_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                 @OA\Property(property="image", type="string", example="/images/phpSeG13H.png"),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Post(
 *     path="/api/posts",
 *     summary="Create post",
 *     tags={"Post"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="content", type="string", example="Some content"),
 *                     @OA\Property(property="image", type="image", example="image1.png"),
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     ),
 * ),
 * @OA\Patch(
 *     path="/api/posts/{post}",
 *     summary="Update post",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         description="Post ID",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="title", type="string", example="Some title"),
 *                     @OA\Property(property="content", type="string", example="Some content"),
 *                     @OA\Property(property="image", type="image", example="image1.png"),
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     ),
 * ),
 * @OA\Delete(
 *     path="/api/posts/{post}",
 *     summary="Delete post",
 *     tags={"Post"},
 *     @OA\Parameter(
 *         description="Post ID",
 *         in="path",
 *         name="post",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     ),
 * ),
 */
class PostController extends Controller
{
}
