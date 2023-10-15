<header class="header">
    <div class="container bg-light d-flex justify-content-between align-items-center">
        <div class="d-flex">
            <a href="{{ route('index')  }}" class="logo">Laravel</a>
            <form class="form-inline my-2 my-lg-0 ml-3">
                <input class="form-control form-control-sm" type="search" placeholder="搜索" aria-label="Search">
                <button class="btn btn-sm btn-outline-success ml-2 px-4">搜索</button>
            </form>
        </div>
        <div class="right-btn">
{{--     登录成功之后       --}}
            @auth
                <a href="{{ route('user.info')  }}" class="text-dark mr-3 text-decoration-none">
                    <img
                        style="border-radius: 50%"
                        src="https://img2.baidu.com/it/u=1551650866,1013758275&fm=253&app=138&size=w931&n=0&f=JPEG&fmt=auto?sec=1697475600&t=2b89916b41aa507503f23b54a6bff7ea" width="30" height="30" alt="">
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
