@if(!empty($comment))
    <div>
        <h2>您有新的通知</h2>
        <h3>{{ $comment -> user -> name }} 对你的博客进行了评论， 您的博客 [{{$comment -> blog -> title}}] 有新的评论</h3>

        <h1>
            {{ $comment -> content  }}
        </h1>
    </div>
@else
    <div>博客为空</div>
@endif
