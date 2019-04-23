@extends('layouts.home')
@section('title')
    <title>文章详情页</title>
@endsection

@section('main')
    <!-- //btm-wthree-left -->
    <div class="col-md-9 btm-wthree-left">
        <div class="agileits_heading_section">
            <h3 class="wthree_head">文章详情</h3>
        </div>
        <div class="events w3">
            <div class="events-main">
                <div class="events-top">
                    <div class="col-md-6  w3-agile fea-right">
                        <h3><a href="{{route('a.detail',['id'=>$data->id])}}">{{$data->title}}</a></h3>
                        <span>浏览量:{{$data->read_num}}</span>
                        <span>发表时间:{{$data->created_at}}</span>
                        <div class="w3agile_special_deals_grid_left_grid">
                            <a href="{{route('a.detail',['id'=>$data->id])}}"><img src="{{$data->face}}" class="img-responsive" alt=""
                                /></a>
                        </div>
                        <h4>{{$data->content}}</h4>
                        </div>

                    <div class="clearfix"> </div>
                </div>
            </div>
            <nav class="events agileits">
                {{--                {{$data->links()}}--}}
            </nav>
        </div>
    </div>

@endsection
