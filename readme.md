## About this Project

This project is my first personal Web in the Internet.

You can browse Yattao[https://www.yattao.top] to visit this complete.



## Power By

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>



## Technology stack

HTML

CSS

JS

PHP7.2+

MySQL5.8+

Bootstrap 4

Laravel6


## Target of This Project

- Message Board
- Blog
- User Login
- Push this Web application in Internet

## Core Code

Message Board Core Code

```PHP
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
        return redirect()->to(route('msgs.index'))->with('success', '成功删除留言');
    }

}
```

## Summaries

Mastering the use of the Laravel framework allows you to quickly develop a WEB application based on Laravel and familiarize yourself with using bootstrap to build front-end pages.

Third-party cloud chip behavior verification is used as additional validation.

