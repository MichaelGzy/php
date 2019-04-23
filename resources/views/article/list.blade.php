@extends('layouts.public')
@section('title','文章列表页')
@section('css')
    <link rel="stylesheet" href="/css/bootstrap.css">
@endsection



@section('cnt')
    <div class="container">
        @if(session()->has('loginsuccess'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>tips:</strong>{{session('loginsuccess')}}
            </div>
        @endif
        <div style="margin: 20px" class="text-right">

            <div class="col-lg-4">

                <form action="{{route('a.list')}}" method="get">
                    <div class="input-group">
                        <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <input  class="btn btn-primary" type="submit" value="文章搜索">
{{--                        <button  class="btn btn-primary search" type="button" value="">搜索</button>--}}
                    </span>
                    </div>
                </form>
                    @if(session()->has('hotwords'))
                        热门搜索:
                        @foreach(session('hotwords') as $k=>$v)
                            <a href="#">{{$v}}</a>
                        @endforeach
                    @endif
            </div>

            <div class="text-right col-lg-20">
                <a href="{{route('home')}}"  class="btn btn-info">首页</a>

{{--                暂时关闭--}}
{{--                <a href="{{route('u.list')}}"  class="btn btn-primary">用户列表</a>--}}
                <a href="{{route('a.list')}}"  class="btn btn-warning">个人文章页</a>
                <a href="{{route('l.logout')}}"  class="btn btn-danger">点此退出</a>
                您好! <a href="{{route('u.detail')}}">{{session('userinfo.username')}}</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div  class="col-lg-2 "><a class="btn btn-info" href="#">共计有:{{$num}}篇文章</a></div>
            <div  class="col-lg-1 "><a href="{{route('a.list')}}"  class="btn btn-warning">全部文章</a></div>
            <div  class="col-lg-1 "><a href="{{route('a.hot')}}"  class="btn btn-danger">热门文章</a></div>
        </div>
        <table class="table table-striped">

            <tr>
                <th><input type="checkbox">全选</th>
                <th>标题:</th>
{{--                <th>内容:</th>--}}
                <th>封面:</th>
                <th>作者:</th>
                <th>阅读数:</th>
                <th>发表时间:</th>
                <th>最新修改时间:</th>
                <th>操作</th>
            </tr>
            @foreach($data as $item)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$item->title}}</td>
{{--                    <td>{{$item->content}}</td>--}}
                    <td><img src="{{$item->face}}" alt="封面"></td>
                    <td>{{$item->user_id}}</td>
                    <td>{{$item->read_num}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <a href="{{route('a.edit',['id'=>$item->id])}}" class="btn-xs btn btn-primary">修改</a>
                        <a id="aa" href="{{route('a.del',['id'=>$item->id])}}" class="btn-xs btn btn-danger del">删除</a>
                        <a href="{{route('a.detail',['id'=>$item->id])}}">查看详情</a>
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $data->appends(request()->except(['page']))->render() }}
    </div>

@endsection

@section('js')
    <script src="/js/jquery3.4.0.js"></script>
    <script src="/js/bootstrap.js"></script>
    <script src="/js/sweetalert.js"></script>
    <script>

        let _token = "{{ csrf_token() }}";
        $('.del').on('click',function (evt) {
            // evt.preventDefault();
            //获取相关信息
            let url = $(this).attr('href');
            let type = 'DELETE';
            let data = {_token};

            swal({
                title: "确定删除?",
                text: "一旦删除,还得再添加.少删一点吧",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url,
                        type,
                        data
                    }).then(function (value) {
                        if (value.status ==200){
                            swal("好吧,已经删了!", {
                                icon: "success",
                            }).then(()=>{
                                setTimeout('window.location.href="{{route('a.list')}}"');

                            })
                        }else{
                            swal("删除失败!", {
                                icon: "warning",
                            });
                        }
                        {{--location.href="{{route('u.list')}}";--}}
                        // $(this).parent('tr').remove();
                    });
                }
            });
            return false;
        });


    </script>
@endsection
