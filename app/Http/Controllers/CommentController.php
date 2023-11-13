<?php

namespace App\Http\Controllers;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

/**
 * Comment controller.
 */
class CommentController extends Controller
{
    private CommentService $commentService;

    /**
     * Comment controller constructor.
     */
    public function __construct()
    {
        $this->commentService = new CommentService();
    }

    /**
     * Index action. Get all comments.
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $comments = $this->commentService->getAll();

        return response()->json([
           'comments' => $comments,
        ]);
    }

    /**
     * Show action. Get one comment.
     * @param Comment $comment
     * @return JsonResponse
     */
    public function show(Comment $comment): JsonResponse
    {
        $comment = $this->commentService->getOne($comment);

        return response()->json([
           'comment' => $comment,
        ]);
    }

    /**
     * Store action. Create a new comment.
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

        $this->commentService->create($request);
    }

    /**
     * Update action. Update a comment.
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return JsonResponse|void
     */
    public function update(UpdateRequest $request, Comment $comment)
    {
        if (!($request->validated())) {
            return response()->json([
                'message' => 'Validation error',
            ]);
        }

        $this->commentService->update($request, $comment);
    }

    /**
     * Destroy action. Delete a comment.
     * @param Comment $comment
     * @return void
     */
    public function destroy(Comment $comment): void
    {
        $this->commentService->delete($comment);
    }
}
