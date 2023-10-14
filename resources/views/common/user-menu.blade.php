<div class="card">
    <ul class="list-group list-group-flush text-center">
        <li class="list-group-item {{ $nav === 'info' ? 'bg-primary' : '' }}">
            <a href="{{ route('user.info')  }}" class="{{ $nav === 'info' ? 'text-white' : '' }}">个人信息</a>
        </li>
        <li class="list-group-item {{ $nav === 'avatar' ? 'bg-primary' : '' }}">
            <a href="{{ route('user.avatar') }}" class="{{ $nav === 'avatar' ? 'text-white' : '' }}">修改头像</a>
        </li>
        <li class="list-group-item {{ $nav === 'blog' ? 'bg-primary' : '' }}">
            <a href="{{ route('user.blog') }}" class="{{ $nav === 'blog' ? 'text-white' : '' }}">所有博客</a>
        </li>
    </ul>
</div>
