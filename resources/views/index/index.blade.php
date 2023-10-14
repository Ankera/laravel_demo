@extends('layout.app')

@section('title', '博客首页')

@section('style')
    <link rel="stylesheet" href="{{ asset('css/index.css')  }}">
    <style>

    </style>
@endsection

@section('content')
    <div class="jumbotron jumbotron-fluid px-0">
        <div class="container text-white text-center">
            <h4 class="display-6">基于Laravel的博客项目</h4>
            <p class="lead">项目仅用于学习</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-body">
                        @foreach(range(1, 10) as $v)
                            <div class="article-body">
                                <div>
                                    <span class="article-author">小明</span>
                                    <span class="article-time">6个月前</span>
                                </div>
                                <h2 class="font-weight-bold my-3 article-title">
{{--                                    <a class="text-dark" href="{{ route('blog.show', ['blog' => 121]) }}">博客博客博客博客博客</a>--}}
                                    <a class="text-dark" href="{{ route('blog.show', 121) }}">博客博客博客博客博客</a>
                                </h2>
                                <div class="article-des">这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介这是详情简介</div>
                                <div>
                                    <a href="#" class="badge badge-warning mt-3 article-">前端</a>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <nav class="d-flex justify-content-center mt-4">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link" tabindex="-1" aria-disabled="true">
                                        上一页
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">
                                        2
                                        <span class="sr-only-focusable"></span>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">下一页</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 p-0">
                @include('common.right-card', [
                    'imgurl' => 'https://img2.baidu.com/it/u=1361506290,4036378790&fm=253&app=138&size=w931&n=0&f=JPEG&fmt=auto?sec=1697389200&t=8d0743af3879a6c19628b2014ce06ee5',
                    'title' => '博客网站',
                    'content' => '这是内容',
                    'count' => '121'
                ])
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
