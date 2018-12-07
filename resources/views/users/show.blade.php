@extends('layouts.app')

@section('title',$user->name . '的个人中心')

@section('content')
    <div class="row justify-content-md-center justify-content-lg-center justify-content-center" style="padding-top: 130px">
        <div class="col-md-4 col-lg-3 hidden-sm hidden-xs user-info ">
            <div class="card-deck">
                <div class="card">
                    <img src="{{ $user->avatar }}"
                                 width="300px" height="300px" alt="" class="img-thumbnail rounded d-block mx-auto">
                        <div class="card-body" >
                            <hr class="mt-0">
                                <h2 class="text-center">{{ $user->name }}</h2>
                            <hr class="mt-0">
                            <h4 class="card-text"><strong>注册于</strong></h4>
                            <p class="card-text"><small class="text-muted">{{ $user->created_at->diffForHumans() }}</small></p>
                        </div>
                </div>
            </div>
        </div>


        {{--<div class="col-12 col-md-8 col-sm-12 col-lg-9 ">--}}
                {{--<div class="card card-group">--}}
                    {{--<div class="card-body">--}}
                            {{--<h1 class="card-title pull-left" style="font-size: 30px;">--}}
                                {{--{{ $user->name }}--}}
                            {{--</h1>--}}
                            {{--<p class="lead">{{ $user->email }}</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<hr>--}}

                {{--用户发布的内容--}}
                {{--<div class="card card-group">--}}
                    {{--<div class="card-body">--}}
                        {{--<ul class="nav nav-tabs">--}}
                            {{--<li class="nav-item"><a class="nav-link {{ active_class(if_query('tab', null)) }}" href="{{ route('users.show', $user->id) }}">Ta 的话题</a></li>--}}
                            {{--<li class="nav-item"><a class="nav-link {{ active_class(if_query('tab', 'replies')) }}" href="{{ route('users.show', [$user->id, 'tab'=>'replies']) }}">Ta 的回复</a></li>--}}
                        {{--</ul>--}}
                        {{--@if(if_query('tab', 'replies'))--}}
                            {{--@include('users._replies', ['replies'=>$user->replies()->with('topic')->recent()->paginate(5)])--}}
                        {{--@else--}}
                            {{--@include('users._topics',['topics' => $user->topics()->recent()->paginate(5)])--}}
                        {{--@endif--}}
                    {{--</div>--}}
                {{--</div>--}}
        </div>
    </div>
@stop

