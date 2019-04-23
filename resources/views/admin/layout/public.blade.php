<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <title>后台管理页面</title>
    <link rel="stylesheet" type="text/css" href="{{$adminurl}}/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="{{$adminurl}}/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="{{$adminurl}}/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="{{$adminurl}}/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="{{$adminurl}}/static/h-ui.admin/css/style.css" />

    @yield('css')
</head>
<body>
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl">
            <a class="logo navbar-logo f-l mr-10 hidden-xs" href="{{route('admin.index')}}">后台管理系统</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v1.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                            <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                            <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover">
                        <a href="#" class="dropDown_A">{{session('userinfo')->username}}<i class="Hui-iconfont">&#xe6d5;
                            </i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="#">切换账户</a></li>
                            <li><a href="{{route('admin.logout')}}">退出</a></li>
                        </ul>
                    </li>
{{--                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>--}}
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<aside class="Hui-aside">
    <div class="menu_dropdown bk_2">

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i>用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="{{route('u.list')}}" data-title="用户列表" >用户列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-article">
            <dt><i class="Hui-iconfont">&#xe616;</i>管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a data-href="{{route('r.list')}}" data-title="角色列表" href="javascript:void(0)">角色列表</a></li>
                    <li><a data-href="{{route('r.list')}}" data-title="管理员列表" href="javascript:void(0)">管理员列表</a></li>
                    <li><a data-href="{{route('r.list')}}" data-title="XX列表" href="javascript:void(0)">xx列表</a></li>
                </ul>
            </dd>
        </dl>

    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>

@yield('cnt')

<div class="contextMenu" id="Huiadminmenu">
    <ul>
        <li id="closethis">关闭当前 </li>
        <li id="closeall">关闭全部 </li>
    </ul>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="{{$adminurl}}/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="{{$adminurl}}/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="{{$adminurl}}/static/h-ui/js/H-ui.min.js"></script>
<script type="text/javascript" src="{{$adminurl}}/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->


@yield('js')

</body>
</html>
