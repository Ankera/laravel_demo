@extends('layout.app')

@section('title', '发布博客')

@section('style')
    <style>

    </style>
@endsection


@section('content')
    <div class="container">
        <div class="card mb-3 mt-4">
            <div class="card-body">
                @include('common.error')
                @include('common.success')
                <form method="post" action="{{ route('blog.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">标题</label>
                        <input
                            type="text"
                            name="title"
                            value="{{ old('title') }}"
                            class="form-control"
                            id="exampleFormControlInput1"
                            placeholder="请填写标题">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">分类</label>
                        <select
                            class="form-control"
                            name="category_id"
                            id="exampleFormControlSelect1">
                            <option value="0">请选择分类</option>
                            @foreach(categories() as $id => $name)
                                <option {{ old('category_id') == $id ? 'selected' : ''  }} value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">内容</label>
                        <textarea
                            name="content"
                            value="{{ old('content') }}"
                            placeholder="请填写内容"
                            class="form-control"
                            id="exampleFormControlTextarea1"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary w-25 offset-4">发布</button>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>

    </script>
@endsection
