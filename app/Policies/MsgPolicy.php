<?php

namespace App\Policies;

use App\Models\Msg;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;


class MsgPolicy
{
    use HandlesAuthorization;

    protected $admin;

    /**
     * Create a new policy instance.
     * set admin user info for this policy
     *
     * @return void
     */
    public function __construct()
    {
        $this->admin = User::all()->first()->id;
    }

    public function delete(User $user, Msg $msg)
    {
       return $user->isAuthorOf($msg) || $user->id == $this->admin;
    }
}
