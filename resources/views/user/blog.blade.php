@extends('layout.app')

@section('title', '修改个人博客')

@section('style')
    <style>
        .blog-detail-logo {
            width: 16px;
            height: 16px;
        }
        .blog-list:last-child {
            border-bottom: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'blog'])
            </div>

            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        所有博客
                    </div>
                    <div class="card-body">
                        @foreach(range(1, 5) as $v)
                            <div class="blog-list border-bottom pb-3 mt-3">
                                <div>博客标题博客标题博客标题博客标题</div>
                                <div class="mt-2 d-flex justify-content-between">
                                    <div class="fs-14 text-muted">
                                        <img class="blog-detail-logo" src="{{ asset('img/blog-detail-time.png')  }}" alt="">
                                        <span class="mr-2">5个月前</span>
                                        <img class="blog-detail-logo" src="{{ asset('img/blog-detail-eye.png')  }}" alt="">
                                        <span class="mr-2">412</span>
                                        <img class="blog-detail-logo" src="{{ asset('img/blog-detail-comment.png')  }}" alt="">
                                        <span class="mr-2">60</span>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-sm py-0 px-3 btn-primary">编辑</a>
                                        <a href="#" class="btn btn-sm py-0 px-3 btn-danger ml-2">删除</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
