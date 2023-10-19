@extends('layout.app')

@section('title', '博客详情')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/markdown.css')  }}">
    <style>
        .blog-detail-logo {
            width: 16px;
            height: 16px;
        }
        .blog-pkq-logo {
            border-radius: 50%;
        }
        .replay:last-child {
            border-bottom: none !important;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="font-weight-light text-center mb-3">
                            {{ $blog -> title }}
                        </h3>
                        <div class="text-center fs-14 text-muted">
                            <img class="blog-detail-logo" src="{{ asset('img/blog-detail-time.png')  }}" alt="">
                            <span class="mr-2">
                                {{ $blog -> updated_at -> diffForHumans() }}
                            </span>
                            <img class="blog-detail-logo" src="{{ asset('img/blog-detail-eye.png')  }}" alt="">
                            <span class="mr-2">
                                {{ $blog -> view }}
                            </span>
                            <img class="blog-detail-logo" src="{{ asset('img/blog-detail-comment.png')  }}" alt="">
                            <span class="mr-2">
{{--                                {{ $blog -> view }}--}}
                                0
                            </span>
                        </div>
                        <hr>
                        <div class="markdown" id="content">
                            {{ $blog -> content }}
                        </div>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-white fs-14">
                        回复数量
                    </div>
                    <div class="card-body" id="comment_list">
                        @forelse($blog -> comments as $comment)
                            <div class="media mb-3 border-bottom pb-3 replay">
                                <img class="blog-pkq-logo mr-2" width="50" height="50" src="{{ avatar($comment -> user -> avatar) }}" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">
                                        {{  $comment -> user -> name }}
                                    </h5>
                                    {{ $comment -> content  }}
                                </div>
                            </div>
                        @empty
                            <div id="empty" class="text-center py-3 text-dark">暂无评论...</div>
                        @endforelse
                    </div>
                </div>

                @auth
                    <div class="card mt-4">
                        <div class="card-body pb-2">
                            <form id="form_comment" method="post" action="{{ route('blog.comment', $blog) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFromControlTextarea1"></label>
                                    <textarea name="content" placeholder="请填写" class="form-control" id="exampleFromControlTextarea1"></textarea>
                                </div>
                                <div class="text-right">
                                    <button id="btn_comment" type="button" class="btn btn-primary btn-sm px-5">评论</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="card mt-4">
                        <div class="card-body pb-2">
                            <div class="alert alert-warning" role="alert">
                                您还没有登录，请登录再回复评论
                                <a href="{{ route('login') }}" class="btn btn-primary btn-sm py-1 px-4 ml-3 ">马上登录</a>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>

            <div class="col-sm-3 p-0">
                @include('common.right-card', [
                    'imgurl' => 'https://img2.baidu.com/it/u=1361506290,4036378790&fm=253&app=138&size=w931&n=0&f=JPEG&fmt=auto?sec=1697389200&t=8d0743af3879a6c19628b2014ce06ee5',
                    'title' => $blog -> category -> name,
                    'content' => '收录了相关'.$blog -> category -> name.'文章',
                    'count' => $blog -> category -> blogs() -> count(),
                    'category_id' => $blog -> category_id
                ])
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    $(function () {
        $('#btn_comment').click(function () {
            var form = $('#form_comment');
            $.ajax({
                url: form.attr('action'),
                type: 'post',
                data: form.serialize(),
                dataType: 'json',
                success: function (res) {
                    if(res.code === 200){
                        showMsg(res.msg, "success", 2000);
                        $('#comment_list').append(`
                            <div class="media mb-3 border-bottom pb-3 replay">
                                <img class="blog-pkq-logo mr-2" width="50" height="50" src="${res.data.avatar_url}" alt="">
                                <div class="media-body">
                                    <h5 class="mt-0">
                                         ${res.data.name}
                                    </h5>
                                        ${res.data.content}
                                    </div>
                                </div>
                            `)
                        $('textarea[name="content"]').val('');
                        $('#empty').hide()
                    } else {
                        showMsg(res.msg, "error", 2000);
                    }
                }
            })
        })
    })
    </script>
@endsection
