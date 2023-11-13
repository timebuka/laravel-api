<?php

namespace App\Http\Controllers\Swagger;

use Illuminate\Routing\Controller;
use OpenApi\Annotations as OA;

/**
 * @OA\Get(
 *     path="/api/comments",
 *     summary="Get all comments",
 *     tags={"Comment"},
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="comments", type="object",
 *                 @OA\Property(property="current_page", type="integer", example=1),
 *                 @OA\Property(property="data", type="array", @OA\Items(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="post_id", type="integer", example=1),
 *                     @OA\Property(property="author", type="string", example="Some author"),
 *                     @OA\Property(property="text", type="string", example="Some text"),
 *                     @OA\Property(property="created_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                     @OA\Property(property="updated_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                 )),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Get(
 *     path="/api/comments/{comment}",
 *     summary="Get one comment",
 *     tags={"Comment"},
 *     @OA\Parameter(
 *         description="Comment ID",
 *         in="path",
 *         name="comment",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *             @OA\Property(property="comment", type="object",
 *                 @OA\Property(property="id", type="integer", example=1),
 *                 @OA\Property(property="post_id", type="integer", example=1),
 *                 @OA\Property(property="author", type="string", example="Some author"),
 *                 @OA\Property(property="text", type="string", example="Some text"),
 *                 @OA\Property(property="created_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *                 @OA\Property(property="updated_at", type="timestamp", example="2023-06-17T18:31:55.000000Z"),
 *             ),
 *         ),
 *     ),
 * ),
 * @OA\Post(
 *     path="/api/comments",
 *     summary="Create comment",
 *     tags={"Comment"},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="post_id", type="integer", example=1),
 *                     @OA\Property(property="author", type="string", example="Some author"),
 *                     @OA\Property(property="text", type="string", example="Some text"),
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
 *     path="/api/comments/{comment}",
 *     summary="Update comment",
 *     tags={"Comment"},
 *     @OA\Parameter(
 *         description="Comment ID",
 *         in="path",
 *         name="comment",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="id", type="integer", example=1),
 *                     @OA\Property(property="post_id", type="integer", example=1),
 *                     @OA\Property(property="author", type="string", example="Some author"),
 *                     @OA\Property(property="text", type="string", example="Some text"),
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
 *     path="/api/comments/{comment}",
 *     summary="Delete comment",
 *     tags={"Comment"},
 *     @OA\Parameter(
 *         description="Comment ID",
 *         in="path",
 *         name="comment",
 *         required=true,
 *         example=1
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="OK"
 *     ),
 * ),
 */
class CommentController extends Controller
{
}
