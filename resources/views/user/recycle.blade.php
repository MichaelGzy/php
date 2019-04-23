@extends('layouts.public')
@section('title','列表显示')
@section('css')
    <link rel="stylesheet" href="/css/bootstrap.css">
@endsection

@section('cnt')
{{--    @if(session()->has('record'))--}}
{{--        <div class="alert alert-success">--}}
{{--            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--}}
{{--            <strong>提示</strong> 共计:{{session('record')}}条记录!--}}
{{--        </div>--}}
{{--    @endif--}}
    <div class="container">
        <div style="margin: 20px" class="text-right">
            <div class="col-lg-6">
                <form action="{{route('u.list')}}" method="get">
                    <div class="input-group">
                        <input type="text" id="keyword" name="keyword" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <input  class="btn btn-primary" type="submit" value="用户名搜索">
{{--                        <button  class="btn btn-primary search" type="button" value="">用户名搜索</button>--}}
                    </span>
                    </div>
                </form>
            </div>
            <a href="{{route('u.add')}}"  class="btn btn-success">添加用户</a>
            <a href="{{route('u.dellist')}}"  class="btn btn-success">回收站</a>
        </div>
        <table class="table table-striped">
            <tr>
                <th><input type="checkbox">全选</th>
                <th>用户名:</th>
                <th>年龄:</th>
                <th>性别:</th>
                <th>邮箱:</th>
                <th>添加时间:</th>
                <th>修改时间:</th>
                <th>操作</th>
            </tr>
            @foreach($data as $item)
                <tr>
                    <td><input type="checkbox"></td>
                    <td>{{$item->username}}</td>
                    <td>{{$item->age}}</td>
                    <td>{{$item->sex}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <a href="{{route('u.edit',['id'=>$item->id])}}" class="btn-xs btn btn-primary">还原</a>
                        <a id="aa" href="{{route('u.del',['id'=>$item->id])}}" class="btn-xs btn btn-danger
                        del">删除</a>
                    </td>
                </tr>
            @endforeach
        </table>

        <p class="text-left">共计有:{{$num}}条记录</p>
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
            })
                .then((willDelete) => {
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
                                    setTimeout('window.location.href="{{route('u.list')}}"');

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

        {{--let urls = '{{route('u.list')}}';--}}
        {{--$('.search').on('click',function (evt) {--}}
        {{--    evt.preventDefault();--}}
        {{--    let keyword = document.getElementById('keyword').value;--}}
        {{--    // console.log(keyword);--}}
        {{--    $.ajax({--}}
        {{--        type:"GET",--}}
        {{--        url:urls,--}}
        {{--        data:{keyword,_token},--}}
        {{--        success:function (res) {--}}
        {{--            alert(res);--}}
        {{--            // $(res.data).each(function (i,obj) {--}}
        {{--            //         console.log(obj.id);--}}
        {{--            //     }--}}
        {{--            //--}}
        {{--            // );--}}
        {{--            console.log(res);--}}
        {{--        }--}}
        {{--    })--}}
        // })
    </script>
@endsection

