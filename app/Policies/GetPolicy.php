<?php

namespace App\Policies;

use App\Get;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GetPolicy
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

    public function update(User $user, Get $get)
    {
        return $user->id === $get->user_id;
    }

    public function delete(User $user, Get $get)
    {
        return $user->id === $get->user_id;
    }
}
