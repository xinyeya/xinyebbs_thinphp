<?php /*a:2:{s:62:"C:\xinye\data\Code\tp5\application\index\view\index\index.html";i:1604715539;s:55:"C:\xinye\data\Code\tp5\application\index\view\base.html";i:1604715485;}*/ ?>
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

    
<link rel="stylesheet" href="/static/css/index/index.css">


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
                
                    <!-- 左边 -->
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="row">
                        <!-- 欢迎 -->
                        <div class="panel">
                            <div class="panel-body">
                                <h4>悠远的天空，在苍穹的尽头</h4>
                                <span>
                            <?php echo date('Y').'年'.date('m').'月'.date('d').'日'; ?>
                        </span>
                                <span id="time">
                        </span>
                                <span>
                            <?php
                                $weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组
                                echo "星期".$weekarray[date("w")];
                            ?>
                        </span>
                            </div>
                        </div>
                        <!-- 热门 -->
                        <div class="panel">
                            <div class="panel-body">
                                <div class="article">
                                    <p>热门文章</p>
                                    <?php if(is_array($article) || $article instanceof \think\Collection || $article instanceof \think\Paginator): $i = 0; $__LIST__ = $article;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                                    <ul>
                                        <li>
                                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                        </li>
                                        <li>
                                            <a href="/article/<?php echo htmlentities($val['id']); ?>"><?php echo htmlentities($val['title']); ?></a>
                                        </li>
                                    </ul>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- 分类 -->
                        <div class="panel">
                            <div class="panel-body">
                                <div class="classify">
                                    <p>分类</p>
                                    <?php if(is_array($classify) || $classify instanceof \think\Collection || $classify instanceof \think\Paginator): $i = 0; $__LIST__ = $classify;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                                    <ul>
                                        <li>
                                            <a href="/article/type/<?php echo htmlentities($val['title']); ?>"><?php echo htmlentities($val['title']); ?></a>
                                        </li>
                                        <li>
                                            <?php echo htmlentities($val['count']); ?>篇
                                        </li>
                                    </ul>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>
                        </div>
                        <!-- 标签 -->
                        <div class="panel">
                            <div class="panel-body">
                                <div class="labels">
                                    <p>标签</p>
                                    <div>
                                        <?php if(is_array($labels) || $labels instanceof \think\Collection || $labels instanceof \think\Paginator): $i = 0; $__LIST__ = $labels;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                                        <a href="/?tag=<?php echo htmlentities($val['title']); ?>">
                                    <span class="tag">
                                        <?php echo htmlentities($val['title']); ?>
                                    </span>
                                        </a>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- 右边 -->
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    
                    <!-- tab 栏 -->
                    <div class="navbar navbar-default hidden-xs nav">
                        <ul class="nav navbar-nav tabs">
                            <li class="nav-item active">
                                <a href="/">全部</a>
                            </li>
                            <li class="nav-item">
                                <a href="/article/type/JavaScript">前端</a>
                            </li>
                            <li class="nav-item">
                                <a href="/article/type/php">PHP</a>
                            </li>
                            <li class="nav-item">
                                <a href="/article/type/python">Python</a>
                            </li>
                            <li class="nav-item">
                                <a href="/article/type/生活">生活</a>
                            </li>
                        </ul>
                        <div class="search">
                            <input type="text" class="form-control" placeholder="关键字">
                            <button type="button" class="btn btn-default">搜索</button>
                        </div>
                    </div>
                    
                    
<div>
    <!-- 文章 -->
    <?php if(is_array($articleList) || $articleList instanceof \think\Collection || $articleList instanceof \think\Paginator): $i = 0; $__LIST__ = $articleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
    <div class="panel">
        <div class="panel-body">
            <div class="article-list">
                <div class="article-item">
                    <!-- 标题 -->
                    <a href="/article/<?php echo htmlentities($val['id']); ?>">
                        <h3><?php echo htmlentities($val['title']); ?></h3>
                    </a>
                    <!-- 详情 -->
                    <div class="desc">
                    <span>
                        <strong>简介：</strong>
                        <?php echo htmlentities($val['desc']); ?>
                    </span>
                        <a href="/article/<?php echo htmlentities($val['id']); ?>">查看原文</a>
                    </div>
                    <!-- 杂项 -->
                    <div class="misce">
                    <span>
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo htmlentities($val['create_time']); ?>
                    </span>
                        <span>
                        <i class="fa fa-commenting" aria-hidden="true"></i>
                        <?php echo htmlentities($val['commont']); ?>
                    </span>
                        <span>
                        <i class="fa fa-eye" aria-hidden="true"></i>
                        <?php echo htmlentities($val['read']); ?>
                    </span>
                        <span>
                        <i class="fa fa-tags" aria-hidden="true"></i>
                        <?php echo htmlentities($val['labels']); ?>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="page">
        <div class="f_page">
            <?php echo $page; ?>
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