@extends('layout.app')

@section('title', '修改个人头像')

@section('style')
    <style>
        .user-avatar {
            width: 64px;
            height: 64px;
            border-radius: 8px;
            border: 1px solid #cccccc;
            margin-bottom: 16px;
        }
    </style>
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3">
                @include('common.user-menu', ['nav' => 'avatar'])
            </div>

            <div class="col-sm-9 p-0">
                <div class="card">
                    <div class="card-header bg-white fs-14">
                        修改个人信息
                    </div>
                    <div class="card-body">
                        @include('common.error')
                        @include('common.success')
                        <form
                            method="POST"
                            action="{{ route('user.avatar.update') }}"
                            enctype="multipart/form-data"
                            class="col-md-6 offset-3">
                            @csrf
                            @method('put')
                            @if(isset(auth() -> user() -> avatar))
                                <span>原始头像</span>
                                <img class="user-avatar" src="{{ asset('storage/'.auth() -> user() -> avatar) }}" alt="">
                            @endif
                            <div class="form-group">
                                <label for="exampleInputFile1">请选择头像</label>
                                <input type="file" placeholder="请填写用户名"
                                   class="form-control-file"
                                   id="exampleInputFile1"
                                   name="avatar"
                                   aria-describedby="emailHelp"
                                >
                            </div>

                            <button type="submit" class="btn btn-primary btn-sm w-100 mt-4 bg-blue text-white">修改</button>
                        </form>
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
