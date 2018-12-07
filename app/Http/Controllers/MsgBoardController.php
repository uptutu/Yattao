<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Msg;
use Illuminate\Support\Facades\Auth;

class MsgBoardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index',]);
    }


    public function index()
    {
        $msgs = Msg::orderBy('created_at', 'desc')->get();
        return view('models.messageboard', compact('msgs'));
    }

    public function store(Request $request, Msg $msg)
    {
        $user_id = Auth::id();
        $content = clean( $request->input('content'), 'default');
        if (!empty($content)){
            $msg->user_id = $user_id;
            $msg->content = $content;
            $msg->save();
            return redirect()->to(route('msgs.index'))->with('success', '留言成功！');
        } else {
            return redirect()->to(route('msgs.index'))->with('danger', '留言失败！');
        }
    }

    public function destroy(Msg $msg)
    {
        $this->authorize('delete', $msg);
        $msg->delete();
//        return dd($msg);
        return redirect()->to(route('msgs.index'))->with('success', '成功删除留言');
    }

}
