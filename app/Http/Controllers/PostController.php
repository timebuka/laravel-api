<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Post controller.
 */
class PostController extends Controller
{
    private PostService $postService;

    /**
     * Post controller constructor.
     */
    public function __construct()
    {
        $this->postService = new PostService();
    }

    /**
     * Index action. Get all posts with pagination.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $posts = $this->postService->getAll();

        return response()->json([
           'posts' => $posts,
        ]);
    }

    /**
     * Show action. Get one post.
     * @param Post $post
     * @return JsonResponse
     */
    public function show(Post $post): JsonResponse
    {
        $post = $this->postService->getOne($post);

        return response()->json([
           'post' => $post,
        ]);
    }

    /**
     * Store action. Create new post with image.
     * @param StoreRequest $request
     * @return JsonResponse|void
     */
    public function store(StoreRequest $request)
    {
        if (!($request->validated())) {
            return response()->json([
                'message' => 'Validation error',
            ]);
        }

        $this->postService->create($request);
    }

    /**
     * Update action. Update a post with image.
     * @param UpdateRequest $request
     * @param Post $post
     * @return JsonResponse|void
     */
    public function update(UpdateRequest $request, Post $post)
    {
        if (!($request->validated())) {
            return response()->json([
                'message' => 'Validation error',
            ]);
        }

        $this->postService->update($request, $post);
    }

    /**
     * Destroy action. Delete a post.
     * @param Post $post
     * @return void
     */
    public function destroy(Post $post): void
    {
        $this->postService->delete($post);
    }
}
