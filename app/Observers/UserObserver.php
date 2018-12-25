<?php

namespace App\Observers;

use App\Models\User;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class UserObserver
{
    public function creating(User $user)
    {
        //
    }

    public function updating(User $user)
    {
        //
    }

    public function saving(User $user)
    {
        if (empty($user->avatar)) {
            $user->avatar = 'https://tse2.mm.bing.net/th?id=OIP.TUqsKuGt1PyiTWUslPQmLgAAAA&pid=Api';
        }
    }
}