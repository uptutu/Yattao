<div class="media">

        <a href="{{ route('users.show', $notification->data['user_id']) }}">
            <img class="img-thumbnail mr-3" alt="{{ $notification->data['user_name'] }}" src="{{ $notification->data['user_avatar'] }}"  style="width:48px;height:48px;"/>
        </a>

        <div class="media-body">
            <h5 class="mt-0">
            <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
            评论了
            <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>
            </h5>

            {{--内容--}}
            {!! $notification->data['reply_content'] !!}

            <span class="meta pull-right ml-4" title="{{ $notification->created_at }}">
                <span class="fa fa-clock-o" aria-hidden="true"></span>
                {{ $notification->created_at->diffForHumans() }}
            </span>
        </div>
    </div>

<hr>