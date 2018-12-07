@extends('layouts.app')

@section('title','留言板')

@section('content')
<div class="container" style="padding-top: 60px">

    @include('common.error')
    <div>
        <h3>Hi, 我係 Alex, 請留低妳嘅 Message!</h3>
        <form action="{{ route('msgs.store') }}" method="POST" accept-charset="UTF-8">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                @if(Auth::check())
                <textarea class="form-control" rows="3" placeholder="告诉我那些我不知道的事情" name="content" required></textarea>
                    @else
                    <textarea class="form-control" rows="3" placeholder="请登录再留言" name="content" disabled></textarea>
                    @endif
            </div>
            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-share"></i>留言</button>
        </form>
    </div>

    <hr>

    <div class="reply-list">
        @foreach ($msgs as $index => $msg)
            <div class=" media"  name="msg{{ $msg->id }}" id="name{{ $msg->id }}">

                <a href="{{ route('users.show', [$msg->user_id]) }}">
                    <img class="mr-3 img-thumbnail" alt="{{ $msg->user->name }}" src="{{ $msg->user->avatar }}"  style="width:48px;height:48px;"/>
                </a>


                <div class="media-body">
                    <h5 class="mt-0">
                        <a href="{{ route('users.show', [$msg->user_id]) }}" title="{{ $msg->user->name }}">
                            {{ $msg->user->name }}
                        </a>
                    </h5>

                    {{--内容--}}
                    {!! $msg->content !!}

                    {{-- 回复删除按钮 --}}
                    @can('delete', $msg)
                        <span class="meta pull-right ml-4">
                            <form action="{{ route('msgs.destroy', $msg->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </span>
                    @endcan
                    <span class="meta pull-right ml-4" title="{{ $msg->created_at }}">{{ $msg->created_at->diffForHumans() }}</span>
                </div>


            </div>
            <hr>
        @endforeach
    </div>
</div>
@stop