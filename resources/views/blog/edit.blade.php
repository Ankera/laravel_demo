@extends('layout.app')

@section('title', '编辑博客')

@section('style')
    <style>

    </style>
@endsection


@section('content')
    <div class="container">
        <div class="card mb-3 mt-4">
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">标题</label>
                        <input type="email" class="form-control" value="第一个博客" id="exampleFormControlInput1" placeholder="请填写标题">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">分类</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option value="0">请选择分类</option>
                            @foreach(categories() as $id => $name)
                                <option value="{{$id}}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">内容</label>
                        <textarea
                                  placeholder="请填写内容"
                                  class="form-control"
                                  id="exampleFormControlTextarea1"> #### 这是测试内容 </textarea>
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
