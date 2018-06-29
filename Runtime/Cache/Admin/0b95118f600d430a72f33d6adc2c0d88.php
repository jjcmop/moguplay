<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>-<?php echo C('WEB_SITE_TITLE');?></title>
    <!-- <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon"> -->
    <link href="<?php echo get_cover(C('SITE_ICO'),'path');?>" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
     <script>
        var _hmt = _hmt || [];
        (function() {
          var hm = document.createElement("script");
          hm.src = "https://hm.baidu.com/hm.js?bc19aa51515f215def6b091f540c83ea";
          var s = document.getElementsByTagName("script")[0]; 
          s.parentNode.insertBefore(hm, s);
        })();
    </script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo" ><img src="<?php echo get_cover(C('HT_LOGO'),'path');?>" width="100%" height="100%" /></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $key = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($key % 2 );++$key;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><i class="menu_<?php echo ($key); ?>"></i><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <span style="display:block;float:left;margin:0 10px;color:#fff;">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></span>
            <a href="javascript:;" style="float:left;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li><i  class="man_modify"></i><a href="/media.php" target="_blank">网站首页</a></li>
                <li><i  class="man_modify"></i><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><i  class="man_quit"></i><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>   
        </div>
    </div>
    <!-- /头部 -->
    <!-- 边栏 -->
    <div class="sidebar">
        <div class="user_nav">
           <span><img src="/Public/Admin/images/tx.jpg"></span>
           <p><?php echo session('user_auth.username');?></p>
           <p style="margin-top:0px;"><!-- 管理员 --><?php echo ($quanxian); ?></p>
        </div>
        <div  class="fgx">功能菜单</div>
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!empty($_extra_menu)): ?>
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                    <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                    <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                </li><?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul><?php endif; ?>
                    <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <!-- 标题栏 -->
    <div class="main-title">
        <h2>[用户留存率] 列表</h2>
    </div>
	<div class="cf top_nav_list">
		<div class="fl button_list">
		</div>
		<!-- 高级搜索 -->
		<div class="search-form fr cf">
            <div class="input-list">
                <label>选择日期：</label>
                <input type="text" id="time-start" name="time-start" class="text input-2x" value="<?php echo I('time-start');?>" placeholder="请选择时间" /> 
            </div>
            <div class="i_list" id="" >
                 <div class="drop-down" id="game">
                    <?php if(I('game_name') == ''): ?><input type="text" id="i_list_id" class="sort-txt" value="" placeholder="请选择游戏" />
                    <?php else: ?>
                    <input type="text" id="i_list_id" class="sort-txt" value="<?php echo I('game_name');?>" placeholder="请选择游戏" /><?php endif; ?>
                    <input type="hidden" id="i_list_idh" name="game_name" value="<?php echo I('game_name');?>" />
                    <i class="arrow arrow-down"></i>
                    <ul id="i_list_li" class="nav-list hidden i_list_li">
                        <li><a href="javascript:;" value="" >全部</a></li>
                        <?php $_result=get_game_list();if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:;" value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["game_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>                
            </div>
            <div class="i_list">
                 <div class="drop-down" id="promote">
                    <?php if(I('promote_name') == ''): ?><input type="text" id="i_list_id" class="sort-txt" name="promote_name" value="" placeholder="请选择所属渠道" />
                    <?php else: ?>
                    <input type="text" id="i_list_id" class="sort-txt" name="promote_name" value="<?php echo I('promote_name');?>" placeholder="请选择所属渠道" /><?php endif; ?>
                    <input type="hidden" id="i_list_idh" name="promote_id" value="<?php echo I('promote_id');?>" />
                    <i class="arrow arrow-down"></i>
                    <ul id="i_list_li" class="nav-list hidden i_list_li">
                        <li><a href="javascript:;" value="" >全部</a></li>
                        <li><a href="javascript:;" value="0" >自然注册</a></li>
                        <?php $_result=get_promote_all();if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="javascript:;" value="<?php echo ($vo["id"]); ?>" ><?php echo ($vo["account"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>                
            </div>
            <!-- <div class="sleft">
				<a class="sch-btn" href="javascript:;" id="search" url="<?php echo U('stat/userretention','model='.$model['name'],false);?>"><i class="btn-search"></i></a>
			</div> -->
          <!--   <div class="btn-group-click adv-sch-pannel fl">
                <button class="btn">高 级<i class="btn-arrowdown"></i></button>
                <div class="dropdown cf">
                    <div class="row">
                        
                    </div>
                </div>
            </div> -->
            <div class="input-list">
                <a class="sch-btn" href="javascript:;" id="search" url="<?php echo U('stat/userretention','model='.$model['name'],false);?>">搜索</a>
            </div>
		</div>
	</div>

    <!-- 数据列表 -->
    <div class="data-table">
        <div class="data-table table-striped">
            <table>
                <!-- 表头 -->
                <thead>

                    <tr>
                        <th style="text-align:center">注册日期</th>           
                        <th style="text-align:center">新增用户数</th>
                        <th style="text-align:center">1日后</th>
                        <th style="text-align:center">2日后</th>
                        <th style="text-align:center">3日后</th>
                        <th style="text-align:center">4日后</th>
                        <th style="text-align:center">5日后</th>
                        <th style="text-align:center">6日后</th>

                    </tr>
                </thead>
                <!-- 列表 -->
                <tbody>
                 <?php if($t != ''): ?><tr>
                        <td style="text-align:center"><?php echo ($t); ?></td>
                        <td style="text-align:center"><?php echo ($one['yicount']); ?></td>
                        <td style="text-align:center"><?php echo ($one['yiri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['erri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['sanri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['siri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['wuri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['liuri']); ?></td>
                        </tr>
                         <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +1 day")) ?></td>
                        <td style="text-align:center"><?php echo ($tow['dyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['derri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dwuri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dliuri']); ?></td>
                        </tr>
                       <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +2 day")) ?></td>
                        <td style="text-align:center"><?php echo ($three['syicount']); ?></td>
                        <td style="text-align:center"><?php echo ($three['syiri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['serri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['ssanri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['ssiri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['swuri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['sliuri']); ?></td>
                        
                        </tr>
                         <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +3 day")) ?></td>
                        <td style="text-align:center"><?php echo ($four['fyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['ferri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fwuri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fliuri']); ?></td>
                        </tr>
                        <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +4 day")) ?></td>
                        <td style="text-align:center"><?php echo ($five['wyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['werri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wwuri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wliuri']); ?></td>
                        
                        </tr>
                        <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +5 day")) ?></td>
                        <td style="text-align:center"><?php echo ($six['lyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lerri']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lwuri']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lliuri']); ?></td>
                        
                        </tr>

                         <tr>
                         <td style="text-align:center"><?php echo date('Y-m-d',strtotime("$t +6 day")) ?></td>
                        <td style="text-align:center"><?php echo ($seven['qyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qerri']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qwuri']); ?></td>
                        <td style="text-align:center"><?php echo ($seven['qliuri']); ?></td>
                        </tr>
                    <?php else: ?>
                        <tr>
                        <td style="text-align:center"><?php echo get_lastweek_name("6");?></td>
                        <td style="text-align:center"><?php echo ($one['yicount']); ?></td>
                        <td style="text-align:center"><?php echo ($one['yiri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['erri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['sanri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['siri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['wuri']); ?></td>
                        <td style="text-align:center"><?php echo ($one['liuri']); ?></td>
                        </tr>
                          <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("5");?></td>
                        <td style="text-align:center"><?php echo ($tow['dyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['derri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dsanri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dsiri']); ?></td>
                        <td style="text-align:center"><?php echo ($tow['dwuri']); ?></td>
                        <td style="text-align:center"></td>
                        </tr>
                           <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("4");?></td>
                        <td style="text-align:center"><?php echo ($three['syicount']); ?></td>
                        <td style="text-align:center"><?php echo ($three['syiri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['serri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['ssanri']); ?></td>
                        <td style="text-align:center"><?php echo ($three['ssiri']); ?></td>
                        <td style="text-align:center"></td>
                           <td style="text-align:center"></td>                        
                        </tr>
                        
                         <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("3");?></td>
                        <td style="text-align:center"><?php echo ($four['fyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['ferri']); ?></td>
                        <td style="text-align:center"><?php echo ($four['fsanri']); ?></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                          <td style="text-align:center"></td>                        
                        </tr>
                        
                          <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("2");?></td>
                        <td style="text-align:center"><?php echo ($five['wyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($five['wyiri']); ?></td>
                        <td style="text-align:center"><?php echo ($five['werri']); ?></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                          <td style="text-align:center"></td>                        
                        </tr>
                         <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("1");?></td>
                        <td style="text-align:center"><?php echo ($six['lyicount']); ?></td>
                        <td style="text-align:center"><?php echo ($six['lyiri']); ?></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>                        
                        </tr>
                          <tr>
                          <td style="text-align:center"><?php echo get_lastweek_name("");?></td>
                        <td style="text-align:center"><?php echo ($nowyi); ?></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                        <td style="text-align:center"></td>
                          <td style="text-align:center"></td>                        
                        </tr><?php endif; ?>
                       
                </tbody>
            </table>
        </div>
    </div>
    <div class="page">
        <?php echo ((isset($_page) && ($_page !== ""))?($_page):''); ?>
    </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.game-pk.com">手上科技</a>游戏运营平台</div>
                <div class="fr"></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /*初始化导航菜单*/
             $subnav.find(".icon").addClass("icon-fold");
             $subnav.find(".side-sub-menu").siblings(".side-sub-menu").hide();
            
            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");
            //显示选中的菜单
            $subnav.find("a[href='" + url + "']").parent().parent().prev("h3").find("i").removeClass("icon-fold");
            $subnav.find("a[href='" + url + "']").parent().parent().show();

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });
            $("#subnav h3 a").click(function(e){e.stopPropagation()});
            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

            /* 表单获取焦点变色 */
            $("form").on("focus", "input", function(){
                $(this).addClass('focus');
            }).on("blur","input",function(){
                        $(this).removeClass('focus');
                    });
            $("form").on("focus", "textarea", function(){
                $(this).closest('label').addClass('focus');
            }).on("blur","textarea",function(){
                $(this).closest('label').removeClass('focus');
            });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
<link href="/Public/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<?php if(C('COLOR_STYLE')=='blue_color') echo '<link href="/Public/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
//导航高亮
highlight_subnav('<?php echo U('stat/userretention');?>');
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });
     $('#time-start').datetimepicker({
         format: 'yyyy-mm-dd',
         language:"zh-CN",
         minView:2,
         autoclose:true
    });

    $('#datetimepicker').datetimepicker({
       format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true,
        pickerPosition:'bottom-left'
    })
    
    
    $("#game").on('click',function(event) {
        var navlist = $(this).find('.i_list_li');
        if (navlist.hasClass('hidden')) {
            navlist.removeClass('hidden');
            $(this).find('#i_list_id').focus().val('');            
        } else {
            navlist.addClass('hidden');
        }
        $(document).one("click", function(){
            navlist.addClass('hidden');
        });
        event.stopPropagation();
    });

    $('#game #i_list_id').on('keyup',function(event) {
        var val  = $.trim($(this).val()).toLowerCase();
        $(this).closest('.drop-down').find('#i_list_idh').val(val);
    });
    
    $("#game #i_list_li").find("a").each(function(){
        $(this).click(function(){
            var text = $.trim($(this).text()).toLowerCase();
            $(this).closest('.drop-down').find("#i_list_id").val(text);
            $(this).closest('.drop-down').find('#i_list_idh').val(text);
        })
    });
    
    
    $("#promote").on('click',function(event) {
        var navlist = $(this).find('.i_list_li');
        if (navlist.hasClass('hidden')) {
            navlist.removeClass('hidden');
            $(this).find('#i_list_id').focus().val('');            
        } else {
            navlist.addClass('hidden');
        }
        $(document).one("click", function(){
            navlist.addClass('hidden');
        });
        event.stopPropagation();
    });

    $('#promote #i_list_id').on('keyup',function(event) {
        $(this).closest('.drop-down').find('#i_list_idh').val(-1);
    });
    
    $("#promote #i_list_li").find("a").each(function(){
        $(this).click(function(){
            var text = $.trim($(this).text()).toLowerCase();
            $(this).closest('.drop-down').find("#i_list_id").val(text);
            $(this).closest('.drop-down').find('#i_list_idh').val($(this).attr('value'));
        })
    });
})
</script>

</body>
</html>