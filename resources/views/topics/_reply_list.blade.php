<div class="reply-list">
    @foreach ($replies as $index => $reply)
        <div class=" media"  name="reply{{ $reply->id }}" id="reply{{ $reply->id }}">

                <a href="{{ route('users.show', [$reply->user_id]) }}">
                    <img class="mr-3 img-thumbnail" alt="{{ $reply->user->name }}" src="{{ $reply->user->avatar }}"  style="width:48px;height:48px;"/>
                </a>


                <div class="media-body">
                    <h5 class="mt-0">
                        <a href="{{ route('users.show', [$reply->user_id]) }}" title="{{ $reply->user->name }}">
                            {{ $reply->user->name }}
                        </a>
                    </h5>

                    {{--内容--}}
                    {!! $reply->content !!}

                    {{-- 回复删除按钮 --}}
                    @can('destroy', $reply)
                        <span class="meta pull-right ml-4">
                            <form action="{{ route('replies.destroy', $reply->id) }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-default btn-xs">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>
                        </span>
                    @endcan
                    <span class="meta pull-right ml-4" title="{{ $reply->created_at }}">{{ $reply->created_at->diffForHumans() }}</span>
                </div>


        </div>
        <hr>
    @endforeach
</div>