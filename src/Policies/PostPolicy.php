<?php

namespace Bitporch\Firefly\Policies;

use App\User;
use Bitporch\Firefly\Models\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given post can be edited by the user.
     *
     * @param \App\User $user
     * @param \App\Post $post
     *
     * @return bool
     */
    public function edit(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param \App\User $user
     * @param \App\Post $post
     *
     * @return bool
     */
    public function update(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }

    /**
     * Determine if the given post can be deleted by the user.
     *
     * @param \App\User $user
     * @param \App\Post $post
     *
     * @return bool
     */
    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user_id;
    }
}
