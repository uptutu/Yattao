@extends('layouts.app')

@section('title', '日志')

@section('content')
    <div class="container" style="padding-top: 60px">
    <div class="row">
        <div class="col topic-list">

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li role="presentation" class="nav-item"><a href="{{ \Illuminate\Support\Facades\URL::current() }}?order=recent" class="nav-link {{ active_class(if_query('order', 'recent') or if_route('topics.index')) }}">最新发布</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    {{-- 话题列表 --}}
                    @include('topics._topic_list', ['topics' => $topics])
                    {{-- 分页 --}}
                    {!! $topics->appends(Request::except('page'))->render() !!}
                </div>
            </div>

        </div>
    </div>
    </div>

@endsection