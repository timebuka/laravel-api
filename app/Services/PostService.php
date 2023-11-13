<?php

namespace App\Services;

use App\Http\Requests\Post\StoreRequest;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Post;
use App\Repositories\PostRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

/**
 * Post service.
 */
class PostService
{
    private PostRepository $postRepository;

    /**
     * Post service constructor.
     */
    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    /**
     * Get all posts with pagination.
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->postRepository->getAll();
    }

    /**
     * Get one post.
     * @param Post $post
     * @return Collection
     */
    public function getOne(Post $post): Collection
    {
        return $this->postRepository->getOne($post);
    }

    /**
     * Create new post with image.
     * @param StoreRequest $request
     * @return void
     */
    public function create(StoreRequest $request): void
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagePath = $image->store('images', 'public');

            $request['image'] = $imagePath;
        }

        $this->postRepository->create($request);
    }

    /**
     * Update a post with image.
     * @param UpdateRequest $request
     * @param Post $post
     * @return void
     */
    public function update(UpdateRequest $request, Post $post): void
    {
        if ($request->hasFile('image')) {
            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $image = $request->file('image');

            $imagePath = $image->store('images', 'public');

            $request['image'] = $imagePath;
        }

        $this->postRepository->update($request, $post);
    }

    /**
     * Delete a post.
     * @param Post $post
     * @return void
     */
    public function delete(Post $post): void
    {
        $this->postRepository->delete($post);
    }
}
