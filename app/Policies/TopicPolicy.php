<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{

    protected $admin;

    public function __construct()
    {
        $this->admin = User::all()->first()->id;
    }

    public function isAdmin(User $user)
    {
        return $user->id === $this->admin;
    }

    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }
}
