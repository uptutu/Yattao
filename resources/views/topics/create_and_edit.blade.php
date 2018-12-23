@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/simditor.css') }}" type="text/css">
@stop

@section('content')

    <div class="container" style="padding-top: 60px">
        <div class="col">
            <div class=" card">

                <div class="card-header">
                    <h2 class="text-center">
                        <i class="fa fa-edit"></i>
                        @if($topic->id)
                            编辑日志
                        @else
                            新建日志
                        @endif
                    </h2>
                </div>

                @include('common.error')

                <div class="card-body">
                    @if($topic->id)
                        <form action="{{ route('topics.update', $topic->id) }}" method="POST" accept-charset="UTF-8">
                            <input type="hidden" name="_method" value="PUT">
                            @else
                                <form action="{{ route('topics.store') }}" method="POST" accept-charset="UTF-8">
                                    @endif

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                    <div class="form-group">
                                        <label for="title-field">主题</label>
                                        <input class="form-control" type="text" name="title" id="title-field" value="{{ old('title', $topic->title ) }}" placeholder="请填写标题" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="body-field">内容</label>
                                        <textarea name="body" id="editor" class="form-control" rows="3" required placeholder="请至少写三个字的内容">{{ old('body', $topic->body ) }}</textarea>
                                    </div>

                                    <div class="well well-sm">
                                        <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle pr-2"></span>保存</button>
                                        <a class="btn btn-link pull-right" href="{{ route('topics.index') }}"><i class="fa fa-backward"></i>  Back</a>
                                    </div>
                                </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript"  src="{{ asset('js/module.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/hotkeys.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/uploader.js') }}"></script>
    <script type="text/javascript"  src="{{ asset('js/simditor.js') }}"></script>

    <script>
        $(document).ready(function(){
            var editor = new Simditor({
                textarea: $('#editor'),
                upload: {
                    url: '{{ route('topics.upload_image') }}',
                    params: { _token: '{{ csrf_token() }}' },
                    fileKey: 'upload_file',
                    connectionCount: 3,
                    leaveConfirm: '文件上传中，关闭此页面将取消上传。'
                },
                pasteImage: true,
                toolbar : [
                    'title',
                    'bold',
                    'italic',
                    'underline',
                    'strikethrough',
                    'fontScale',
                    'color',
                    '|',
                    'ol',
                    'ul',
                    'blockquote',
                    'code',
                    'table',
                    'link',
                    'image',
                    'hr',
                    '|',
                    'indent',
                    'outdent',
                    'alignment',
                ],
                allowedAttributes : {
                    img: ['src', 'alt', 'width', 'height', 'data-non-image'],
                    a: ['href', 'target'],
                    font: ['color', 'size'],
                    code: ['class'],
                },
                allowTags : ['br', 'span', 'a', 'img', 'b', 'strong', 'i', 'strike', 'u', 'font', 'p', 'ul', 'ol', 'li', 'blockquote', 'pre', 'code', 'h1', 'h2', 'h3', 'h4', 'hr'],
                codeLanguages : [
                    { name: 'Bash', value: 'bash' },
                    { name: 'C++', value: 'c++' },
                    { name: 'C#', value: 'cs' },
                    { name: 'CSS', value: 'css' },
                    { name: 'Erlang', value: 'erlang' },
                    { name: 'Less', value: 'less' },
                    { name: 'Sass', value: 'sass' },
                    { name: 'Diff', value: 'diff' },
                    { name: 'CoffeeScript', value: 'coffeescript' },
                    { name: 'HTML,XML', value: 'html' },
                    { name: 'JSON', value: 'json' },
                    { name: 'Java', value: 'java' },
                    { name: 'JavaScript', value: 'js' },
                    { name: 'Markdown', value: 'markdown' },
                    { name: 'Objective C', value: 'oc' },
                    { name: 'PHP', value: 'php' },
                    { name: 'Perl', value: 'parl' },
                    { name: 'Python', value: 'python' },
                    { name: 'Ruby', value: 'ruby' },
                    { name: 'SQL', value: 'sql'}
                ]
            });
        });
    </script>
@stop