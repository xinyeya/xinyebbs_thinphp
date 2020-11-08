<?php

namespace app\index\controller;

use think\Controller;

class Menu extends Controller
{
    // 资源页面
    public function recourse() {
        // 前端
        $web = [
            ['link' => 'https://cn.vuejs.org/index.html', 'image'=>'/static/image/recourse/web/Vue.png', 'title'=> 'Vue官方网站', 'desc'=> '渐进式国产JavaScript框架'],
            ['link' => 'https://zh-hans.reactjs.org/', 'image'=>'/static/image/recourse/web/react.png', 'title'=> 'React官方网站', 'desc'=> ' Facebook 内部开源出来的一个前端 UI 开发框架'],
            ['link' => 'https://angular.cn/docs', 'image'=>'/static/image/recourse/web/Angular.png', 'title'=> 'Angular官方网站', 'desc'=> ' 适合用于快速开发基于web的单页面应用'],
            ['link' => 'https://www.webpackjs.com/concepts/', 'image'=>'/static/image/recourse/web/webpack.png', 'title'=> 'webpack中文网站', 'desc'=> 'JavaScript的静态模块打包器'],
            ['link' => 'https://es6.ruanyifeng.com/', 'image'=>'/static/image/recourse/web/es6.png', 'title'=> '阮一峰es6', 'desc'=> '一直在学习的'],
            ['link' => 'https://jquery.cuishifeng.cn/index.html', 'image'=>'/static/image/recourse/web/jQuery.png', 'title'=> 'jqeury中文网', 'desc'=> ' jQuery是一个快速、简洁的JavaScript框架'],
            ['link' => 'http://lesscss.cn/', 'image'=>'/static/image/recourse/web/less.png', 'title'=> 'less中文网', 'desc'=> '一门 CSS 预处理语言'],
            ['link' => 'https://www.babeljs.cn/', 'image'=>'/static/image/recourse/web/babel.png', 'title'=> 'babel中文网', 'desc'=> 'Babel 是一个 JavaScript 编译器'],
            ['link' => 'https://www.nextjs.cn/', 'image'=>'/static/image/recourse/web/nextjs.png', 'title'=> 'next中文网', 'desc'=> '一个用于 生产环境的React 框架'],
            ['link' => 'https://www.gulpjs.com.cn/', 'image'=>'/static/image/recourse/web/gulp.png', 'title'=> 'gulp', 'desc'=> '用于构建流式开发'],
            ['link' => 'https://react-guide.github.io/react-router-cn/', 'image'=>'/static/image/recourse/web/router.png', 'title'=> 'React Router 中文文档', 'desc'=> '建议用react-router-dom'],
            ['link' => 'https://www.redux.org.cn/', 'image'=>'/static/image/recourse/web/redux-store.png', 'title'=> 'Redux 中文文档', 'desc'=> 'Redux 是 JavaScript 状态容器，提供可预测化的状态管理。'],
        ];

        // php
        $php = [
            ['link' => 'https://www.kancloud.cn/manual/thinkphp5_1/353946', 'image'=>'/static/image/recourse/php/thinkphp.png', 'title'=> 'ThinkPHP5.1', 'desc'=> '一个国产的PHP框架'],
            ['link' => 'https://www.golaravel.com/', 'image'=>'/static/image/recourse/php/laravel.png', 'title'=> 'Laravel','desc'=> '为 WEB 艺术家创造的 PHP 框架'],
            ['link' => 'https://www.yiiframework.com/doc/guide/2.0/zh-cn', 'image'=>'/static/image/recourse/php/yii2.png','title'=> 'Yii', 'desc'=> '适合开发大型应用'],
            ['link' => 'https://github.com/CraryPrimitiveMan/awesome-php-zh_CN#php%E7%BD%91%E7%AB%99-php-websites', 'image'=>'/static/image/recourse/php/php.png','title'=> 'PHP开发资源', 'desc'=> 'PHP开发资源'],
            ['link' => 'https://www.fastadmin.net/', 'image'=>'/static/image/recourse/php/fastadmin.png','title'=> 'fastAdmin', 'desc'=> 'thinphp二次开发模板'],
            ['link' => 'https://www.bt.cn/', 'image'=>'/static/image/recourse/php/baota.png','title'=> '宝塔', 'desc'=> '宝塔linux面板'],
        ];

        // loader插件
        $loader = [
            ['link' => 'http://momentjs.cn/', 'image'=>'/static/image/recourse/loader/time.png', 'title'=> 'Moment.js', 'desc'=> 'JavaScript 日期处理类库'],
            ['link' => 'https://aui.github.io/art-template/zh-cn/docs/', 'image'=>'/static/image/recourse/loader/template.png', 'title'=> 'art-template', 'desc'=> '一个简约、超快的模板引擎。'],
            ['link' => 'https://www.iceui.net/iceEditor.html', 'image'=>'/static/image/recourse/loader/isEditor.png', 'title'=> 'iceEditor', 'desc'=> 'ceEditor是一款简约风格的富文本编辑器'],
            ['link' => 'https://echarts.apache.org/zh/index.html', 'image'=>'/static/image/recourse/loader/echars.png', 'title'=> 'EChars', 'desc'=> '个性化定制的数据可视化图表'],
            ['link' => 'http://doc.quilljs.cn/1434140', 'image'=>'/static/image/recourse/loader/quill.png', 'title'=> 'Vue-Quill-Editor中文文档', 'desc'=> '基于 Quill、适用于 Vue 的富文本编辑器，支持服务端渲染和单页应用。'],
            ['link' => 'https://www.geetest.com/', 'image'=>'/static/image/recourse/loader/check.png', 'title'=> '极验', 'desc'=> '手势验证码'],
            ['link' => 'https://www.swiper.com.cn/', 'image'=>'/static/image/recourse/loader/swiper.png', 'title'=> 'Swiper', 'desc'=> '纯javascript打造的滑动特效插件，面向手机、平板电脑等移动终端'],
            ['link' => 'https://www.lodashjs.com/', 'image'=>'/static/image/recourse/loader/Lodash.png', 'title'=> 'Lodash', 'desc'=> '一个一致性、模块化、高性能的 JavaScript 实用工具库。'],
        ];

        // 资源
        $recourse = [
            ['link' => 'http://pic.netbian.com/', 'image'=>'/static/image/recourse/recou/bian.png', 'title'=> '彼岸桌面', 'desc'=> '很多高清壁纸，但是收费'],
            ['link' => 'https://www.52doutu.cn/', 'image'=>'/static/image/recourse/recou/doutu.png', 'title'=> '我爱斗图', 'desc'=> '搜索多种表情包'],
            ['link' => 'https://588ku.com/', 'image'=>'/static/image/recourse/recou/qianku.png', 'title'=> '千库网', 'desc'=> '正版可商用图，收费'],
            ['link' => 'https://www.acgbbs.net/', 'image'=>'/static/image/recourse/recou/acg-bbs.png', 'title'=> 'ACG中文社区', 'desc'=> 'ACG中文社区'],
            ['link' => 'https://www.52pojie.cn/portal.php', 'image'=>'/static/image/recourse/recou/52pojie.png', 'title'=> '吾爱破解', 'desc'=> '个人比较喜欢的一个资源网站'],
            ['link' => 'https://www.rjsos.com/', 'image'=>'/static/image/recourse/recou/sos.png', 'title'=> '软件SOS', 'desc'=> '分享各种破解软件'],
            ['link' => 'https://www.ghpym.com/', 'image'=>'/static/image/recourse/recou/guohe.png', 'title'=> '果核剥壳', 'desc'=> '分享好玩的小软件和活动'],
            ['link' => 'https://greasyfork.org/zh-CN', 'image'=>'/static/image/recourse/recou/youhou.png', 'title'=> '油猴脚本', 'desc'=> '超强的浏览器插件'],
            ['link' => 'http://www.acgjc.com/', 'image'=>'/static/image/recourse/recou/acg-music.png', 'title'=> '漫音社', 'desc'=> '比较喜欢的二次元音乐网站'],
            ['link' => 'https://www.aigei.com/', 'image'=>'/static/image/recourse/recou/aigei.png', 'title'=> '爱给网', 'desc'=> '免费配乐，游戏，视频素材'],
            ['link' => 'https://www.iconfont.cn/', 'image'=>'/static/image/recourse/recou/iconfont.png', 'title'=> '阿里矢量库', 'desc'=> '比较全的矢量图库'],
            ['link' => 'http://www.fontawesome.com.cn/', 'image'=>'/static/image/recourse/recou/font-awesome.png', 'title'=> 'font-awesome中文网', 'desc'=> '比较好的字体图标网站'],
            ['link' => 'https://www.bootcdn.cn/', 'image'=>'/static/image/recourse/recou/bootcdn.png', 'title'=> 'BootCDN', 'desc'=> '前端CDN加速服务'],
            ['link' => 'https://www.jq22.com/', 'image'=>'/static/image/recourse/recou/jqLoader.png', 'title'=> 'jq插件库', 'desc'=> 'jQuery插件，部分要积分'],
            ['link' => 'https://developer.mozilla.org/zh-CN/', 'image'=>'/static/image/recourse/recou/MDN.png','title'=> 'MDN recou docs', 'desc'=> '介绍一些关于编程和互联网的基本概念'],
        ];

        // UI库
        $ui = [
            ['link' => 'https://element.eleme.io/#/zh-CN', 'image'=>'/static/image/recourse/ui/elementui.png', 'title'=> 'ElementUI', 'desc'=> '基于 Vue 2.0 的桌面端组件库'],
            ['link' => 'https://element.eleme.io/#/zh-CN', 'image'=>'/static/image/recourse/ui/Bootstrap.png', 'title'=> 'bootstrap', 'desc'=> '简洁、直观、强悍的前端开发框架'],
            ['link' => 'https://nervjs.github.io/taro/docs/README', 'image'=>'/static/image/recourse/ui/taro.png', 'title'=> 'TaroUI', 'desc'=> '一个开放式跨端跨框架解决方案'],
            ['link' => 'https://www.layui.com/', 'image'=>'/static/image/recourse/ui/layui.png', 'title'=> 'layui', 'desc'=> '经典模块化前端框架'],
            ['link' => 'https://youzan.github.io/vant/#/zh-CN/', 'image'=>'/static/image/recourse/ui/vant.png', 'title'=> 'vantUI', 'desc'=> '轻量、可靠的移动端 Vue 组件库'],
            ['link' => 'https://mobile.ant.design/index-cn', 'image'=>'/static/image/recourse/ui/ant-design.png', 'title'=> 'ant-design', 'desc'=> '一个基于 Preact / React / React Native 的 UI 组件库'],
            ['link' => 'http://www.uviewui.com/components/intro.html', 'image'=>'/static/image/recourse/ui/uview.png', 'title'=> 'uview', 'desc'=> 'uni-app生态专用的UI框架'],
            ['link' => 'http://v1.iviewui.com/', 'image'=>'/static/image/recourse/ui/iview.png', 'title'=> 'iviewUI', 'desc'=> '一套基于 Vue.js 的高质量UI 组件库'],
        ];

        // 友情链接
        $friend = [];

        $data['web'] = $web;
        $data['php'] = $php;
        $data['recourse'] = $recourse;
        $data['ui'] = $ui;
        $data['loader'] = $loader;
        $data['friend'] = $friend;

        return $this->fetch('menu/recourse', $data);
    }

    // 关于博主页面
    public function about() {
        return $this->fetch('menu/about');
    }
}
