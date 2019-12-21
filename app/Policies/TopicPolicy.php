<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{

    protected $adminId;

    public function __construct()
    {
        $this->adminId = User::all()->first()->id;
    }

    public function isAdmin(User $user)
    {
        return $user->id == $this->adminId;
    }

    public function update(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
    }
}
