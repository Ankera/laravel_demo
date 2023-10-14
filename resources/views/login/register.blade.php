@extends('layout.app')

@section('title', '注册')

@section('style')
    <style>

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row pt-4">
            <div class="card col-lg-4 offset-4 mb-3 mt-5">
                <div class="card-body">
                    @include('login.nav-top', ['nav' => 'register'])
                    <hr>
                </div>
                <form>
                    <div class="form-group">
                        <label for="exampleInputName" class="fs-14 font-weight-bold">用户名</label>
                        <input type="email" class="form-control form-control-sm"
                               id="exampleInputName" placeholder="请填写用户名"
                               aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail" class="fs-14 font-weight-bold">邮箱</label>
                        <input type="email" class="form-control form-control-sm"
                               id="exampleInputEmail" placeholder="请填写邮箱"
                               aria-describedby="emailHelp"
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="fs-14 font-weight-bold">密码</label>
                        <input type="password" class="form-control form-control-sm"
                               id="exampleInputPassword1" placeholder="请填写密码"
                               aria-describedby="passwordHelp"
                        >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword2" class="fs-14 font-weight-bold">密码</label>
                        <input type="password" class="form-control form-control-sm"
                               id="exampleInputPassword2" placeholder="请填写确认密码"
                               aria-describedby="passwordHelp"
                        >
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm w-100 mt-4 mb-4">注册</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>

    </script>
@endsection
