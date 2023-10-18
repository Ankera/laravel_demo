<header class="header">
    <div class="container bg-light d-flex justify-content-between align-items-center">
        <div class="d-flex">
            <a href="{{ route('index')  }}" class="logo">Laravel</a>
            <form method="get" action="{{ route('index') }}" class="form-inline my-2 my-lg-0 ml-3">
                <input
                    name="keyword"
                    class="form-control form-control-sm"
                    type="search"
                    placeholder="搜索"
                    value="{{ request() -> query('keyword') }}"
                    aria-label="Search">
                <label for="exampleFormControlSelect1"></label><select
                    class="form-control form-control-sm ml-2"
                    name="category_id"
                    id="exampleFormControlSelect1">
                    <option value="0">请选择分类</option>
                    @foreach(categories() as $id => $name)
                        <option {{ request() -> query('category_id') == $id ? 'selected' : ''  }} value="{{$id}}">{{ $name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-sm btn-outline-success ml-2 px-4">搜索</button>
            </form>
        </div>
        <div class="right-btn">
{{--     登录成功之后       --}}
            @auth
                <a href="{{ route('user.info')  }}" class="text-dark mr-3 text-decoration-none">
                    @if(isset(auth() -> user() -> avatar))
                        <img
                            style="border-radius: 50%"
                            src="{{ asset('storage/'.auth() -> user() -> avatar) }}" width="30" height="30" alt="">
                    @endif
                    <span>{{ isset(auth() -> user() -> name) ? auth() -> user() -> name : '-'  }}</span>
                </a>
                <form action="{{ route('logout')  }}" method="POST" class="d-inline" id="logout">
                    @csrf
                    <a href="javascript:;" onclick="document.getElementById('logout').submit()" class="text-dark text-decoration-none">
                        退出
                    </a>
                </form>
            @else
                <a href="/login" class="btn btn-sm btn-primary">登录</a>
                <a href="/register" class="btn btn-sm btn-outline-success ml-2">注册</a>
            @endauth
        </div>
    </div>
</header>
