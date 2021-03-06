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
            

            
<link rel="stylesheet" type="text/css" href="/Public/Admin/css/admin_table.css" media="all">
<script type="text/javascript" src="/Public/static/uploadify/jquery.uploadify.min.js"></script>
    <div class="main-title cf">
        <h2>[广告]新增</h2>
    </div>
    <!-- 标签页导航 -->
<div class="tab-wrap">
    <ul class="tab-nav nav">
		<li data-tab="tab1" class="current"><a href="javascript:void(0);">基础</a></li></li>
    </ul>
    <div class="tab-content zc_for">
    <!-- 表单 -->
    <form id="form" action="<?php echo U('add_media_adv?model='.$model['id']);?>" method="post" class="form-horizontal">
        <!-- 基础文档模型 -->
        <div id="tab1" class="tab-pane in tab1">
            <table  border="0" cellspacing="0" cellpadding="0">
                <tbody>
                    <tr>
                        <td class="l">广告标题：</td>
                        <td class="r" colspan='3'>
                           <input type="text" class="txt txt_title" name="title" value="" >
                        </td>
                    </tr>
                    <tr>
                        <td class="l">广告链接：</td>
                        <td class="r" colspan='3'>
                           <input type="text" class="txt txt_title" name="url" value="">
                        </td>
                    </tr>
                     <tr>
                        <td class="l">开始时间：</td>
                        <td class="r">
                           <input type="text" class="txt time" name="start_time" value="" placeholder="默认没有时间限制">
                        </td>
                         <td class="l">结束时间：</td>
                        <td class="r">
                          <input type="text" class="txt time" name="end_time" value="" placeholder="默认没有时间限制">
                        </td>
                    </tr>
                    <tr>
                        <td class="l">广告排序：</td>
                        <td class="r">
                            <input type="text" class="txt" name="sort" value="0">
                        </td>
                        <td class="l">打开方式：</td>
                        <td class="r">
                           <label class="inp_radio">
                                <input type="radio" class="inp_radio" value="_blank" name="target" checked="checked">新页面
                                <input type="radio" class="inp_radio" value="_self" name="target" >本页面
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td class="l">广告图片：</td>
                        <td class="r" colspan='3'>
                            <input type="file" id="upload_picture_pic">
                            <input type="hidden" name="data" id="pic_id"/>
                            <div class="upload-img-box">
                            <?php if(!empty($data['data'])): ?><div class="upload-pre-item"><img src="<?php echo (get_cover($data['data'],'path')); ?>"/></div><?php endif; ?>
                            </div>
                            <span class="infonotice" style="top:20px;" >(<?php echo ($advpos["width"]); ?>*<?php echo ($advpos["height"]); ?>)</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-item cf">
            <input type='hidden' name="pos_id" value="<?php echo I('pos_id');?>" />
            <button class="btn submit-btn ajax-post hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <a class="btn btn-return" href="javascript:history.back(-1);">返 回</a>
        </div>
    </form>
    </div>
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
<link href="/Public/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="/Public/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="/Public/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
//导航高亮
highlight_subnav('<?php echo U('Adv/media_adv_pos_lists');?>');

//Think.setValue("module", <?php echo ((isset($data["module"]) && ($data["module"] !== ""))?($data["module"]): 'media'); ?>);

$(function(){
    $("#game_name").val($("#game_id option:selected").text());
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    $('.time').datetimepicker({
        language:"zh-CN",
        hour: 13,
        minute: 15
    });
    showTab();

});

$('#submit').click(function(){
    $('#form').submit();
});

/* 初始化上传插件 */
$("#upload_picture_pic").uploadify({
    "height"          : 30,
    "swf"             : "/Public/static/uploadify/uploadify.swf",
    "fileObjName"     : "download",
    "buttonText"      : "上传图标",
    "uploader"        : "<?php echo U('File/uploadPicture',array('session_id'=>session_id()));?>",
    "width"           : 120,
    'removeTimeout'   : 1,
    'fileTypeExts'    : '*.jpg; *.png; *.gif;',
    "onUploadSuccess" : upload_picture_pic<?php echo ($field["name"]); ?>,
    'onFallback' : function() {
        alert('未检测到兼容版本的Flash.');
    }
});
function upload_picture_pic<?php echo ($field["name"]); ?>(file, data){
    var data = $.parseJSON(data);
    var src = '';
    if(data.status){
        $("#pic_id").val(data.id);
        src = data.url || '' + data.path;
        $("#pic_id").parent().find('.upload-img-box').html(
            '<div class="upload-pre-item"><img src="' + src + '"/></div>'
        );
    } else {
        updateAlert(data.info);
        setTimeout(function(){
            $('#top-alert').find('button').click();
            $(that).removeClass('disabled').prop('disabled',false);
        },1500);
    }
}
</script>

</body>
</html>