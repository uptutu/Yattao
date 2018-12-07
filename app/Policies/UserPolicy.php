<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * 这是验证用户身份的一个策略，判断当前访问的信息页面的用户对象是不是所登录的用户对象.
     *
     * @param $currentUser User
     * @param $user User
     * @return bool
     */
   public function update(User $currentUser, User $user )
   {
       return $currentUser->id === $user->id;
   }
}
