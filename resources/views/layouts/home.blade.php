<!DOCTYPE html>
<html lang="en">
<head>
    @yield('title')
    <link href="/home/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" /><!-- fontawesome -->
    <link href="/home/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" /><!-- Bootstrap stylesheet -->
    <link href="/home/css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- stylesheet -->
    <!-- meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Fashion " />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //meta tags -->
    <!--fonts-->
    <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <!--//fonts-->
    <script type="text/javascript" src="/home/js/jquery-2.1.4.min.js"></script>
    <script src="/home/js/main.js"></script>
    <!-- Required-js -->
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="/home/js/move-top.js"></script>
    <script type="text/javascript" src="/home/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $(".scroll").click(function(event){
                event.preventDefault();
                $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
            });
        });
    </script>
    <!-- start-smoth-scrolling -->

    <!-- scriptfor smooth drop down-nav -->
    <script>
        $(document).ready(function(){
            $(".dropdown").hover(
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function() {
                    $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <!-- //script for smooth drop down-nav -->
</head>
<body>
<!-- header -->
<header>
    <div class="w3layouts-top-strip">
        <div class="container">
            <div class="logo">
                <h1><a href="index.html">欢迎光临本站</a></h1>
                <p style="text-align: right">书籍是造就灵魂的工具。——雨果</p>
            </div>
            {{--            <div class="w3ls-social-icons">--}}
            {{--                <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>--}}
            {{--                <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>--}}
            {{--                <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>--}}
            {{--                <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>--}}
            {{--                <a class="linkedin" href="#"><i class="fa fa-google-plus"></i></a>--}}
            {{--                <a class="linkedin" href="#"><i class="fa fa-rss"></i></a>--}}
            {{--                <a class="linkedin" href="#"><i class="fa fa-behance"></i></a>--}}
            {{--            </div>--}}
        </div>
    </div>
    <!-- navigation -->
    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="{{route('home')}}">首页</a></li>
                    @if(session()->has('userinfo'))
                        <li><a href="{{route('a.add')}}">写文章</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">您好,{{session('userinfo.username')}}<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('a.list')}}">我的文章</a></li>
                            <li><a class="active"  href="{{route('u.detail')}}">个人信息</a></li>
                            <li><a href="{{route('l.logout')}}">退出登录</a></li>
                        </ul>
                    </li>
                    @else
                        <li><a href="{{route('l.login')}}">登录</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
            <div class="w3_agile_login">
                <div class="cd-main-header">
                    <a class="cd-search-trigger" href="#cd-search"> <span></span></a>
                    <!-- cd-header-buttons -->
                </div>
                <div id="cd-search" class="cd-search">
                    <form action="#" method="post">
                        <input name="Search" type="search" placeholder="Search...">
                    </form>
                </div>
            </div>
            <div class="clearfix"> </div>

        </div><!-- /.container-fluid -->
    </nav>

    <!-- //navigation -->
</header>
<!-- //header -->
<!-- banner -->
<div class="agile-banner">
</div>
<!-- //banner -->
<!-- breadcrumbs -->
<div class="breadcrumbs">
    <div class="container">
        <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
            <li><a href="{{route('home')}}">首页</a></li>
            <li><a href="{{route('home.hot')}}">热门</a></li>
        </ol>
    </div>
</div>
<!-- //breadcrumbs -->
<div class="container">
    <div class="banner-btm-agile">




        @yield('main')






        <!-- //btm-wthree-left -->
        <!-- btm-wthree-right -->
        <div class="col-md-3 w3agile_blog_left">
            <div class="wthreesearch">
                @csrf
                <form action="{{route('home')}}" method="get">
                    <input type="search" name="keyword" placeholder="搜标题" required="">
                    <button type="submit" class="btn btn-default search" aria-label="Left Align">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                </form>

                <div>
                    @if(session()->has('hotwords'))
                        热门搜索:
                        <ul>
                            @foreach(session('hotwords') as $k=>$v)
                                <li><a href="#">{{$v}}</a></li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="agileinfo_calender">
                <h3>热门推荐</h3>
                <div class="w3ls-social-icons-1">
                    <a class="fa fa-rss" href="{{route('home.hot')}}">热门文章</a>
                    {{--                    <a class="twitter" href="#"><i class="fa fa-twitter"></i></a>--}}
                    {{--                    <a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a>--}}
                    {{--                    <a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a>--}}
                    {{--                    <a class="linkedin" href="#"><i class="fa fa-google-plus"></i></a>--}}
                    {{--                    <a class="linkedin" href="#"><i class="fa fa-rss"></i></a>--}}
                    {{--                    <a class="linkedin" href="#"><i class="fa fa-behance"></i></a>--}}
                </div>
            </div>
                        <div class="w3ls_popular_posts">
                            <h3>Popular Posts</h3>
                            <div class="agileits_popular_posts_grid">
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="/home/images/p1.jpg" class="img-responsive" alt="" /></a>
                                </div>
                                <h4><a href="singlepage.html">Tellus Faucibus Eleifend Sit Amet</a></h4>
                                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                            </div>
                            <div class="agileits_popular_posts_grid">
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="/home/images/p2.jpg" class="img-responsive" alt="" /></a>
                                </div>
                                <h4><a href="singlepage.html">Mauris Ut Odio Sed Nisi Convallis</a></h4>
                                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                            </div>
                            <div class="agileits_popular_posts_grid">
                                <div class="w3agile_special_deals_grid_left_grid">
                                    <a href="singlepage.html"><img src="/home/images/p3.jpg" class="img-responsive" alt="" /></a>
                                </div>
                                <h4><a href="singlepage.html">Curabitur A Sapien Et Tellus Faucibus</a></h4>
                                <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                            </div>
                        </div>

                        <div class="w3l_categories">
                            <h3>Categories</h3>
                            <ul>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>tellus faucibus eleifend sit amet</a></li>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Mauris ut odio sed nisi convallis</a></li>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Curabitur a sapien et tellus faucibus</a></li>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>porta nunc eget, lobortis nulla</a></li>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Sed ut metus turpis cursus convallis</a></li>
                                <li><a href="singlepage.html"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>Maecenas cursus at ex a faucibus</a></li>
                            </ul>
                        </div>
                        <div class="w3ls_recent_posts">
                            <h3>Recent Posts</h3>
                            <div class="agileits_recent_posts_grid">
                                <div class="agileits_recent_posts_gridl">
                                    <div class="w3agile_special_deals_grid_left_grid">
                                        <a href="singlepage.html"><img src="/home/images/r1.jpg" class="img-responsive" alt="" /></a>
                                    </div>
                                </div>
                                <div class="agileits_recent_posts_gridr">
                                    <h4><a href="singlepage.html">velit esse quam nihil</a></h4>
                                    <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="agileits_recent_posts_grid">
                                <div class="agileits_recent_posts_gridl">
                                    <div class="w3agile_special_deals_grid_left_grid">
                                        <a href="singlepage.html"><img src="/home/images/r2.jpg" class="img-responsive" alt="" /></a>
                                    </div>
                                </div>
                                <div class="agileits_recent_posts_gridr">
                                    <h4><a href="singlepage.html">Class aptent taciti </a></h4>
                                    <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <div class="agileits_recent_posts_grid">
                                <div class="agileits_recent_posts_gridl">
                                    <div class="w3agile_special_deals_grid_left_grid">
                                        <a href="singlepage.html"><img src="/home/images/r3.jpg" class="img-responsive" alt="" /></a>
                                    </div>
                                </div>
                                <div class="agileits_recent_posts_gridr">
                                    <h4><a href="singlepage.html">Maecenas eget erat </a></h4>
                                    <h5><i class="fa fa-calendar" aria-hidden="true"></i>FEB 15,2017</h5>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                        <div class="w3l_tags">
                            <h3>Tags</h3>
                            <ul class="tag">
                                <li><a href="singlepage.html">Fashion</a></li>
                                <li><a href="singlepage.html">Photography</a></li>
                                <li><a href="singlepage.html">Artist</a></li>
                                <li><a href="singlepage.html">Music</a></li>
                                <li><a href="singlepage.html">Shop</a></li>
                                <li><a href="singlepage.html">Corporate</a></li>
                                <li><a href="singlepage.html">Personal</a></li>
                                <li><a href="singlepage.html">Restaurant</a></li>
                                <li><a href="singlepage.html">Business</a></li>
                            </ul>
                        </div>
        </div>
        <!-- //btm-wthree-right -->
        <div class="clearfix"></div>
    </div>
</div>
<!-- footer -->
<div class="footer-agile-info">
    <div class="container">
        <div class="col-md-4 w3layouts-footer">
            <h3>Contact Information</h3>
            <p><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>22 Russell Street, Victoria ,Melbourne AUSTRALIA </p>
            <p><span><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#">E: info [at] domain.com</a> </p>
            <p><span><i class="fa fa-mobile" aria-hidden="true"></i></span>P: +254 2564584 / +542 8245658 </p>
            <p><span><i class="fa fa-globe" aria-hidden="true"></i></span><a href="#">W: www.w3layouts.com</a></p>
        </div>
        <div class="col-md-4 wthree-footer">
            <h2>Fashion Blog</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sedc dnmo eiusmod tempor incididunt ut labore et dolore magna aliqua uta enim ad minim ven iam quis nostrud exercitation ullamco labor nisi ut aliquip exea commodo consequat duis aute .</p>
        </div>
        <div class="col-md-4 w3-agile">
            <h3>Newsletter</h3>
            <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <form action="#" method="post">
                <input type="email" name="Email" placeholder="Email" required="">
                <input type="submit" value="Send">
            </form>
        </div>
    </div>
</div>
<!-- footer -->
<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="w3agile-list">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="lifestyle.html">Life Style</a></li>
                <li><a href="photography.html">Photography</a></li>
                <li><a href="fashion.html">Fashion</a></li>
                <li><a href="icons.html">Codes</a></li>
                <li><a href="features.html">Features</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="agileinfo">
            <p>Copyright &copy; 2019.Company name All rights reserved.More Templates <a href="" target="_blank"
                                                                                        title="珍惜生活">我的博客</a> - Collect
                from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">这里是底儿了</a></p>
        </div>
    </div>
</div>
<!-- //copyright -->
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
            var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
            };
        */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/home/js/bootstrap.js"></script>
</body>
</html>
