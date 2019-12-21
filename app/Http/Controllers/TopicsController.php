<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TopicRequest;
use Illuminate\Support\Facades\Auth;
use App\Handlers\ImageUploadHandler;

class TopicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

	public function index()
	{
		$topics = Topic::with('user')->orderBy('created_at', 'desc')->paginate(30);
		return view('topics.index', compact('topics'));
	}

    public function show(Request $request, Topic $topic)
    {
        if (! empty($topic->slug) && $topic->slug != $request->slug){
            return redirect($topic->link(),301);
        }
        return view('topics.show', compact('topic'));
    }

	public function create(Topic $topic)
	{
        try {
            $this->authorize('isAdmin', $topic);
        } catch (AuthorizationException $e) {
            return view('errors.403');
        }
        return view('topics.create_and_edit', compact('topic'));
	}

	public function store(TopicRequest $request, Topic $topic)
	{
        $topic->fill($request->all());
        $topic->user_id = Auth::id();
        $topic->save();
        return redirect()->to($topic->link())->with('message', '创建成功！');
    }

	public function edit(Topic $topic)
	{
        try {
            $this->authorize('isAdmin', $topic);
        } catch (AuthorizationException $e) {
            return view('errors.403');
        }
        return view('topics.create_and_edit', compact('topic'));
	}

	public function update(TopicRequest $request, Topic $topic)
	{
        try {
            $this->authorize('isAdmin', $topic);
        } catch (AuthorizationException $e) {
            return view('errors.403');
        }
        $topic->update($request->all());

		return redirect()->route('topics.show', $topic->id)->with('message', '更新日志成功');
	}

	public function destroy(Topic $topic)
	{
        try {
            $this->authorize('isAdmin', $topic);
        } catch (AuthorizationException $e) {
            return view('errors.403');
        }
        $topic->delete();

		return redirect()->route('topics.index')->with('message', '删除成功');
	}

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        //初始化返回数据，默认是失败的
        $data = [
            'success' => false,
            'msg' => '上传失败',
            'file_path' => ''
        ];

        //判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file){
            //保存图片到本地
            $result = $uploader->save($request->upload_file, 'topics', \Auth::id(), 1024);
            //图片保存成功的话
            if ($result){
                $data['file_path'] = $result['path'];
                $data['msg'] = '上传成功';
                $data['success'] = true;
            }
        }
        return $data;
    }
}