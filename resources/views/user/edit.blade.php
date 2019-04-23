@extends('layouts.public')
@section('title','修改用户')
@section('css')
    <link rel="stylesheet" href="/css/bootstrap.css">
@endsection

@section('cnt')

        <form class="form-horizontal" method="post" action="{{route('u.edit',['id'=>$data->id])}}">
            {{--关闭csrf--}}
            @csrf
            @method('put')
            <div class="form-group">
                <label   class="col-sm-2 control-label">用户名:</label>
                <div class="col-sm-6">
                    <input type="text" name="username" class="form-control"
                           value="{{$data->username}}">
                </div>
                @if($errors->has('username'))
                    <span style="color: red;">{{$errors->first('username')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">密码:</label>
                <div class="col-sm-6">
                    <input type="text" name="password" class="form-control" value="{{$data->password}}"
                           autocomplete="off">
                </div>
                @if($errors->has('password'))
                    <span style="color: red;">{{$errors->first('password')}}</span>
                @endif
            </div>

            <div class="form-group">
                <label  class="col-sm-2 control-label">确认密码:</label>
                <div class="col-sm-6">
                    <input type="text" name="password_confirmation" class="form-control"
                           value="{{$data->password}}">
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">性别:</label>
                <div class="col-sm-6">
                    女:<input type="radio" name="sex" {{'checked'}} value="0">
                    男:<input type="radio" name="sex"
                    @if(($data->sex)=='男士')
                        {{'checked'}}
                    @endif
                    value="1">
                    @if($errors->has('sex'))
                        <br/><span style="color: red;">{{$errors->first('sex')}}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">年龄:</label>
                <div class="col-sm-6">
                    <input type="text" name="age" class="form-control" value="{{$data->age}}" >
                </div>
                @if($errors->has('age'))
                    <span style="color: red;">{{$errors->first('age')}}</span>
                @endif
            </div>
            <div class="form-group">
                <label  class="col-sm-2 control-label">邮箱:</label>
                <div class="col-sm-6">
                    <input type="email" name="email" class="form-control" value="{{$data->email}}" >
                </div>
                @if($errors->has('email'))
                    <span style="color: red;">{{$errors->first('email')}}</span>
                @endif
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">修改用户</button>
                </div>
            </div>
        </form>
    </div>

@endsection


@section('js')
    <script src="/js/jquery3.4.0.js"></script>
    <script src="/js/bootstrap.js"></script>
@endsection
