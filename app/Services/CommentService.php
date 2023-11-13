<?php

namespace App\Services;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Database\Eloquent\Collection;

/**
 * Comment service.
 */
class CommentService
{
    private CommentRepository $commentRepository;

    /**
     * Comment service constructor.
     */
    public function __construct()
    {
        $this->commentRepository = new CommentRepository();
    }

    /**
     * Get all comments.
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->commentRepository->getAll();
    }

    /**
     * Get one comment.
     * @param Comment $comment
     * @return Collection
     */
    public function getOne(Comment $comment): Collection
    {
        return $this->commentRepository->getOne($comment);
    }

    /**
     * Create a new comment.
     * @param StoreRequest $request
     * @return void
     */
    public function create(StoreRequest $request): void
    {
        $this->commentRepository->create($request);
    }

    /**
     * Update a comment.
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return void
     */
    public function update(UpdateRequest $request, Comment $comment): void
    {
        $this->commentRepository->update($request, $comment);
    }

    /**
     * Delete a comment.
     * @param Comment $comment
     * @return void
     */
    public function delete(Comment $comment): void
    {
        $this->commentRepository->delete($comment);
    }
}
