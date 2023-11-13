<?php

namespace App\Repositories;

use App\Http\Requests\Comment\StoreRequest;
use App\Http\Requests\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Comment repository.
 */
class CommentRepository
{
    /**
     * Get all comments.
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Comment::all();
    }

    /**
     * Get one comment.
     * @param Comment $comment
     * @return Collection
     */
    public function getOne(Comment $comment): Collection
    {
        return Comment::find($comment->id);
    }

    /**
     * Create a new comment.
     * @param StoreRequest $request
     * @return Collection|void
     */
    public function create(StoreRequest $request)
    {
        if (Post::find($request->post_id)) {
            return Comment::create([
                'post_id' => $request->post_id,
                'author' => $request->author,
                'text' => $request->text,
            ]);
        }
    }

    /**
     * Update a comment.
     * @param UpdateRequest $request
     * @param Comment $comment
     * @return void
     */
    public function update(UpdateRequest $request, Comment $comment): void
    {
        $comment = Comment::find($comment->id);

        $comment->post_id = $request->post_id;
        $comment->author = $request->author;
        $comment->text = $request->text;

        $comment->save();
    }

    /**
     * Delete a comment.
     * @param Comment $comment
     * @return void
     */
    public function delete(Comment $comment): void
    {
        $comment = Comment::find($comment->id);

        $comment->delete();
    }
}
