<?php

namespace App\Repositories;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Database\Eloquent\Collection;

/**
 * Post repository.
 */
class PostRepository
{
    /**
     * Get all posts with pagination.
     * @return Collection
     */
    public function getAll(): Collection
    {
        return Post::paginate(10);
    }

    /**
     * Get one post.
     * @param Post $post
     * @return Collection
     */
    public function getOne(Post $post): Collection
    {
        return Post::find($post->id);
    }

    /**
     * Create new post.
     * @param StoreRequest $request
     * @return void
     */
    public function create(StoreRequest $request): void
    {
        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $request->image,
        ]);
    }

    /**
     * Update a post.
     * @param UpdateRequest $request
     * @param Post $post
     * @return void
     */
    public function update(UpdateRequest $request, Post $post): void
    {
        $post = Post::find($post->id);

        $post->title = $request->title;
        $post->content = $request->content;
        $post->image = $request->image;

        $post->save();
    }

    /**
     * Delete a post.
     * @param Post $post
     * @return void
     */
    public function delete(Post $post): void
    {
        $post = Post::find($post->id);

        $post->delete();
    }
}
