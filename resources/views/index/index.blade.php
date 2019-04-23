@extends('layouts.home')

@section('title')
    <title >首页</title>
@endsection

@section('main')
<!-- //btm-wthree-left -->
<div class="col-md-9 btm-wthree-left">
    <div class="agileits_heading_section">
        <h3 class="wthree_head">最新文章</h3>
        <p class="agileinfo_para">已为您推荐{{$num}}篇文章</p>
    </div>
    <div class="events w3">
        <div class="events-main">
            @foreach($data as $key=>$item)
                @if($key%2)
                    <div class="events-top">
                        <div class="col-md-6  w3-agile fea-right">
                            <h3><a href="{{route('a.detail',['id'=>$item->id])}}">{{$item->title}}</a></h3>
                            <h4>{{$item->content}}</h4>
                            <p>浏览量:{{$item->read_num}}</p>
                            <p>发表时间:{{$item->created_at}}</p>
                            <a class="agileits w3layouts" href="{{route('a.detail',['id'=>$item->id])}}">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                        </div>
                        <div class="col-md-6  fea-left">
                            <div class="w3agile_special_deals_grid_left_grid">
                                <a href="{{route('a.detail',['id'=>$item->id])}}"><img src="{{$item->face}}" class="img-responsive" alt=""
                                    /></a>
                            </div>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                @else
                    <div class="events-top">
                        <div class="col-md-6  fea-left">
                            <div class="w3agile_special_deals_grid_left_grid">
                                <a href="{{route('a.detail',['id'=>$item->id])}}"><img src="{{$item->face}}" class="img-responsive" alt=""
                                    /></a>
                            </div>
                        </div>
                        <div class="col-md-6  fea-right">
                            <h3><a href="{{route('a.detail',['id'=>$item->id])}}">{{$item->title}}</a></h3>
                            <h4>{{$item->content}}</h4>
                            <h6>浏览量:{{$item->read_num}}</h6>
                            <h6>发表时间:{{$item->created_at}}</h6>
                            <a class="agileits w3layouts" href="{{route('a.detail',['id'=>$item->id])}}">Read More <span class="glyphicon agileits w3layouts glyphicon-arrow-right" aria-hidden="true"></span></a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                @endif
            @endforeach
        </div>
        <nav class="events agileits">
            {{ $data->appends(request()->except(['page']))->render() }}
        </nav>
    </div>
</div>

@endsection
