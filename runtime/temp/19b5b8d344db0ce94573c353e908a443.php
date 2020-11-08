<?php /*a:2:{s:64:"C:\xinye\data\Code\tp5\application\index\view\menu\recourse.html";i:1604806569;s:55:"C:\xinye\data\Code\tp5\application\index\view\base.html";i:1604715485;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>心叶的个人博客</title>

    <meta name='keywords' content='PHP学习,Python学习,资源,js学习,javascript学习,web学习,日常生活'/>
    <meta name='description' content='一个爱生活的程序员'/>
    <meta name='author' content='xinyejs.com'/>

    <!-- Bootstrap -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- fontawesome -->
    <link rel="stylesheet" href="/static/utils/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="/static/css/layout/index.css">

    
<link rel="stylesheet" href="/static/css/menu/recourse.css">


    <!-- HTML5 shim 和 Respond.js 是为了让 IE8 支持 HTML5 元素和媒体查询（media queries）功能 -->
    <!-- 警告：通过 file:// 协议（就是直接将 html 页面拖拽到浏览器中）访问页面时 Respond.js 不起作用 -->
    <!--[if lt IE 9]>
    <script src="https://cdn.jsdelivr.net/npm/html5shiv@3.7.3/dist/html5shiv.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/respond.js@1.4.2/dest/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <!-- 头部 -->
    <div class="header"></div>

    <!-- menu菜单 -->
    <div class="menu">
        <ul class="hidden-xs hide-sm">
            <li class="menu-item active">
                <a href="/">文章</a>
            </li>
            <li class="menu-item">
                <a href="/recourse">资源</a>
            </li>
            <li class="menu-item">
                <a href="/about">关于</a>
            </li>
        </ul>
        <!-- 移动端显示/隐藏菜单栏 -->
        <div id="nav-btn" class="btn hidden-lg hidden-md hidden-sm">
            <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
    </div>

    <!-- 移动端菜单栏 -->
    <div id="min-nav" class="min-menu hidden-lg hidden-md hidden-sm">
        <ul>
            <a href="/">
                <li class="mobile-menu-item active">文章</li>
            </a>
            <a href="/recourse">
                <li class="mobile-menu-item">资源</li>
            </a>
            <a href="/about">
                <li class="mobile-menu-item">关于</li>
            </a>
        </ul>
    </div>

    <!-- 主要内容 -->
    <div class="main">
        <div class="container">
            <div class="row">
                

                <!-- 右边 -->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    

                    
<div class="recourse container">
    <div class="panel">
        <div class="panel-body">
            <!-- 个人网站 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>个人网站</h4>
                </div>
                <div class="link">
                </div>
            </div>

            <!-- js相关 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>前端相关</h4>
                </div>
                <div class="link">
                    <?php if(is_array($web) || $web instanceof \think\Collection || $web instanceof \think\Paginator): $i = 0; $__LIST__ = $web;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <!-- UI库 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>UI框架</h4>
                </div>
                <div class="link">
                    <?php if(is_array($ui) || $ui instanceof \think\Collection || $ui instanceof \think\Paginator): $i = 0; $__LIST__ = $ui;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <!-- 插件 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>插件库</h4>
                </div>
                <div class="link">
                    <?php if(is_array($loader) || $loader instanceof \think\Collection || $loader instanceof \think\Paginator): $i = 0; $__LIST__ = $loader;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <!-- php相关 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>PHP相关</h4>
                </div>
                <div class="link">
                    <?php if(is_array($php) || $php instanceof \think\Collection || $php instanceof \think\Paginator): $i = 0; $__LIST__ = $php;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <!-- 资源链接 -->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>资源链接</h4>
                </div>
                <div class="link">
                    <?php if(is_array($recourse) || $recourse instanceof \think\Collection || $recourse instanceof \think\Paginator): $i = 0; $__LIST__ = $recourse;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>

            <!--友情链接-->
            <div class="recu">
                <div class="title">
                    <i class="fa fa-map" aria-hidden="true"></i>
                    <h4>友情链接</h4>
                </div>
                <div class="link">
                    <?php if(is_array($friend) || $friend instanceof \think\Collection || $friend instanceof \think\Paginator): $i = 0; $__LIST__ = $friend;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                    <a href=<?php echo htmlentities($val['link']); ?> target="_blank">
                        <div class="item">
                            <img src=<?php echo htmlentities($val['image']); ?> alt="">
                            <div class="text">
                                <h5><?php echo htmlentities($val['title']); ?></h5>
                                <span>
                                    <?php echo htmlentities($val['desc']); ?>
                                </span>
                            </div>
                        </div>
                    </a>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

                </div>
            </div>
        </div>
    </div>

    <!-- 回到顶部 -->
    <i  id="top" class="fa fa-arrow-circle-up top" aria-hidden="true"></i>

    <!-- 底部 -->
    <div class="footer">
        <div class="container">
            <p>
                <a href="/">心叶的个人博客</a>  |  Email:1329132389@qq.com  |  访问量（PV）：<?php echo htmlentities($pv_count); ?>  | 豫ICP备2020030388号
            </p>
            <p>
                <a href="/friends">友情链接</a>  |  © 2020-<?php echo date('Y'); ?> xinye
            </p>
        </div>
    </div>

<!-- jQuery (Bootstrap 的所有 JavaScript 插件都依赖 jQuery，所以必须放在前边) -->
<script src="/static/utils/jq/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="/static/bootstrap/js/bootstrap.min.js"></script>

<script>
    // 监听滚动条
    $(window).scroll(function() {
        let scroH = $(document).scrollTop();  //滚动高度

        if(scroH > 100){  //距离顶部大于100px时
            $("#top").animate({opacity: 1}, 2);
        }else{
            $("#top").animate({opacity: 0}, 2);
        }
    });
    $("#top").on("click", function () {
        $(window).scrollTop(0);
    });

    // 获取时间
    $("document").ready(function () {
        if ($("#time")) {
            setInterval(function () {
                $("#time").html(getTime());
            }, 1000);
        }else{
            return false;
        }
    });
    function getTime() {
        let d = new Date();
        let s = d.getSeconds();
        if (s < 10) {
            s = "0" + s;
        }
        str = `<span class="time">${d.getHours()}:${d.getMinutes()}</span>${s}`;
        return str;
    }

    // 获取当前链接最后的内容
    function getUrl() {
        var htmlHref = window.location.href;
        htmlHref = htmlHref.replace(/^http:\/\/[^/]+/, "");
        var addr = htmlHref.substr(htmlHref.lastIndexOf('/', htmlHref.lastIndexOf('/') - 1) + 1);
        var index = addr.lastIndexOf("\/");
        //js 获取字符串中最后一个斜杠后面的内容
        var str = decodeURI(addr.substring(index + 1, addr.length));
        return str;
    }

    // 判断是否是文章页面
    let is_menu = true;

    // tab菜单栏切换
    switch (getUrl()) {
        case "recourse":
            setMenuActive(1);
            is_menu = false;
            break;
        case "about":
            setMenuActive(2);
            is_menu = false;
            break;
        default:
            setMenuActive(0);
            break;
    }
    function setMenuActive(num) {
        let menuItem = $(".menu-item");
        for (let i=0; i < menuItem.length; i++) {
            menuItem[i].classList.remove("active");
        }
        if (num>=0) {
            menuItem[num].classList.add("active");
        }

        let mobileMenuItem = $(".mobile-menu-item");
        for (let i=0; i < mobileMenuItem.length; i++) {
            mobileMenuItem[i].classList.remove("active");
        }
        if (num>=0) {
            mobileMenuItem[num].classList.add("active");
        }
    }

    // tab导航栏切换
    if (is_menu) {
        switch (getUrl()) {
            case "JavaScript":
                setNavActive(1);
                break;
            case "php":
                setNavActive(2);
                break;
            case "python":
                setNavActive(3);
                break;
            case "生活":
                setNavActive(4);
                break;
            default:
                setNavActive(0);
                break;
        }
        function setNavActive(num) {
            let navItem = $(".nav-item");
            for (let i=0; i < navItem.length; i++) {
                navItem[i].classList.remove("active");
            }
            if (num>=0) {
                navItem[num].classList.add("active");
            }
        }
    }

    // 显示移动端菜单
    let show_nav = true;
    $("#nav-btn").on('click', function () {
        if (show_nav) {
            $("#min-nav").css('display', "block");
            show_nav = false;
        }else{
            $("#min-nav").css('display', "none")
            show_nav = true;
        }
    });
</script>
</body>
</html>