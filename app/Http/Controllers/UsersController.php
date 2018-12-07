<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Http\Requests\UserRequest;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show']]);
    }

    //用户主页
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //用户修改页
    public function edit(User $user)
    {
        $this->authorize('update', $user);
        return view('users.edit', compact('user'));
    }

    //用户修改处理
    //要对模型赋值注意在模型的$fillable属性中是否允许了修改
    public function update(UserRequest $request, User $user, ImageUploadHandler $uploader)
    {
        $this->authorize('update', $user);

        $data = $request->all();

        if ($request->avatar){
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 362);
            if($result){
                $data['avatar'] = $result['path'];
            }
        }
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新完成！');
    }
}
