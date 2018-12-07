@extends('layouts.app')

@section('title', $topic->title)
@section('description', $topic->excerpt)

@section('content')

    <div class="container" style="padding-top: 60px">
    <div class="row">

        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs author-info">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        作者：{{ $topic->user->name }}
                    </div>
                    <hr>
                    <div class="media">
                        <div align="center">
                            <a href="{{ route('users.show', $topic->user->id) }}">
                                <img class="img-thumbnail rounded d-block mx-auto" src="{{ $topic->user->avatar }}" width="300px" height="300px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 topic-content">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center">
                        {{ $topic->title }}
                    </h1>

                    <div class="article-meta text-center">
                        {{ $topic->created_at->diffForHumans() }}
                        ⋅
                        <span class="fa fa-comment" aria-hidden="true"></span>
                        {{ $topic->reply_count }}
                    </div>

                    <div class="topic-body">
                        {!! $topic->body !!}
                    </div>

                    @can('update', $topic)
                        <div class="operate">
                            <hr>
                            <form method="post" action="{{ route('topics.destroy', $topic->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button class="btn btn-default btn-xs pull-right" type="submit" style="margin-left: 6px">
                                    <i class="fa fa-trash"></i> 删除
                                </button>
                            </form>

                            <a href="{{ route('topics.edit', $topic->id) }}" >
                                <button class="btn btn-default btn-xs pull-right">
                                    <i class="fa fa-edit"></i> 编辑
                                </button>
                            </a>

                        </div>
                    @endcan

                </div>
            </div>

            {{--用户回复列表--}}
            <div class="card topic-reply">
                <div class="card-body">
                    @includeWhen(Auth::check(), 'topics._reply_box', ['topic' => $topic])
                    @include('topics._reply_list', ['replies' => $topic->replies()->with('user')->get()])
                </div>
            </div>

        </div>
    </div>
    </div>
@stop