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
                        @if(!empty(auth() -> user() -> blogs))
                            @foreach($blogs as $blog)
                                <div class="blog-list border-bottom pb-3 mt-3 blog-item">
                                    <div>{{ $blog -> title }}</div>
                                    <div class="mt-2 d-flex justify-content-between">
                                        <div class="fs-14 text-muted">
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
                                                {{ $blog -> comments_count }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <div class="custom-control custom-switch mr-3">
                                                <input {{ $blog->status === 1 ? 'checked' : '' }} data-url="{{ route('blog.status', $blog) }}" type="checkbox" class="status-blog custom-control-input" id="customSwitch-{{ $blog->id }}">
                                                <label class="custom-control-label text-muted" style="font-size: 14px;" for="customSwitch-{{ $blog->id }}">是否发布</label>
                                            </div>
                                            <a href="{{ route('blog.edit', $blog -> id) }}" class="btn btn-sm py-0 px-3 btn-primary">编辑</a>
                                            <a href="javascript:;"
                                               data-url="{{ route('blog.destroy', $blog) }}"
                                               class="del-blog btn btn-sm py-0 px-3 btn-danger ml-2">删除</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div>
                                {{ $blogs -> links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function () {
            $('.del-blog').click(function () {
                var that = this;
                $.ajax({
                    url: $(this).data('url'),
                    method: 'delete',
                    dateType: 'json',
                    success: function (res) {
                        $(that).parents('.blog-item').remove();
                        if(res.code === 200){
                            return showMsg(res.msg, "success", 2000);
                        }
                        return showMsg(res.msg, "error", 2000);
                    }
                })
            })

            $('.status-blog').change(function () {
                var that = this;
                $.ajax({
                    url: $(this).data('url'),
                    method: 'patch',
                    dateType: 'json',
                    success: function (res) {
                        if(res.code === 200){
                            return showMsg(res.msg, "success", 2000);
                        }
                        return showMsg(res.msg, "error", 2000);
                    }
                })
            })
        })
    </script>
@endsection
