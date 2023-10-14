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
            <a href="/login/page" class="btn btn-sm btn-primary">登录</a>
            <a href="/register/page" class="btn btn-sm btn-outline-success ml-2">注册</a>
        </div>
    </div>
</header>
