@extends('layouts.public')
@section('title','添加用户')
@section('css')
    <link rel="stylesheet" href="/css/bootstrap.css">
@endsection

@section('cnt')

    <div class="container">
        <p style="margin: 30px"></p>
{{--        @if($errors->any())--}}
{{--                    {{dump($errors)}}--}}
{{--            <div class="alert alert-warning" role="alert">--}}
{{--                @foreach($errors->all() as $error)--}}
{{--                    <ul>--}}
{{--                        <li>{{$error}}</li>--}}
{{--                    </ul>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        @endif--}}
        <form class="form-horizontal" method="post" action="{{route('u.add')}}">
            {{--关闭csrf--}}
            @csrf
            <div class="form-group">
                <label  class="col-sm-2 control-label">用户名:</label>
                <div class="col-sm-6">
                    <input type="text" name="username" class="form-control" placeholder="用户名">
                    @if($errors->has('username'))
                    <span style="color: red;">{{$errors->first('username')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-6">
                    <input type="password" name="password" class="form-control" placeholder="密码" autocomplete="off">
                    @if($errors->has('password'))
                        <span style="color: red;">{{$errors->first('password')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-6">
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="确认密码"
                           autocomplete="off">
                </div>
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">性别:</label>
                <div class="col-sm-6">
                    女:<input type="radio" name="sex" value="0">
                    男:<input type="radio" name="sex" value="1">
                    @if($errors->has('sex'))
                    <br/><span style="color: red;">{{$errors->first('sex')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">年龄:</label>
                <div class="col-sm-6">
                    <input type="text" name="age" class="form-control" placeholder="年龄:" >
                    @if($errors->has('age'))
                        <span style="color: red;">{{$errors->first('age')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" placeholder="邮箱" >
                    @if($errors->has('email'))
                        <span style="color: red;">{{$errors->first('email')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">添加用户</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@section('js')
    <script src="/js/jquery3.4.0.js"></script>
    <script src="/js/bootstrap.js"></script>
@endsection
