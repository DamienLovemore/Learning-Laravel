<?php

namespace App\Policies;

use Illuminate\Auth\Access\Response;
use App\Models\Post;
use App\Models\User;

class PostPolicy
{
    //Permite dar ao administrador permissão de fazer tudo (Roda isso antes de todas as outras coisas, caso não for ignora e vai pra verificação)
    public function before(User $user, string $ability): bool|null
    {
        if($user->is_admin)//Verifies the boolean column if it is true
            return true;

        return null;
    }

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    // /**
    //  * Determine whether the user can delete the model.
    //  */
    // public function update(User $user, Post $post): bool
    // {
    //     return ($user->id === $post->id);
    // }
    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Post $post): Response
    {
        return ($user->id === $post->id) ? Response::allow() : Response::deny(__("You do not have the necessary permissions to do this"), 403);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Post $post): Response
    {
        return ($user->id === $post->id) ? Response::allow() : Response::deny(__("You do not have the necessary permissions to do this"), 403);
    }
}
