<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<META HTTP-EQUIV="Cache-Control" CONTENT="no-cache,no-store, must-revalidate"> 
<META HTTP-EQUIV="pragma" CONTENT="no-cache"> 
<META HTTP-EQUIV="expires" CONTENT="0">
<?php echo hook('syncMeta');?>

<link rel="shortcut icon" href="/ehviews/Public/static/images/favicon.jpg">

<?php echo hook('seo');?>

<?php if($webtitle != ''): ?><title><?php echo ($webtitle); ?>|<?php echo C('WEB_SITE_TITLE');?>|<?php echo C('WEB_SITE_KEYWORD');?></title>
<?php else: ?>
<title><?php echo C('WEB_SITE_TITLE');?>|<?php echo C('WEB_SITE_KEYWORD');?></title><?php endif; ?>

<?php if($webkeyword != ''): ?><meta name="keyword" content="<?php echo ($webkeyword); ?>|<?php echo C('WEB_SITE_KEYWORD');?>">
<?php else: ?>
<meta name="keyword" content="<?php echo C('WEB_SITE_KEYWORD');?>"><?php endif; ?>

<?php if($webdescription != ''): ?><meta name="description" content="<?php echo ($webdescription); ?>|<?php echo C('WEB_SITE_DESCRIPTION');?>">
<?php else: ?>
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>"><?php endif; ?>



<meta name="author" content="zswin.cn">




<!-- Bootstrap core CSS -->
<link href="/ehviews/Public/static/css/bootstrap.css" rel="stylesheet">
<!--external css-->
<link href="/ehviews/Public/static/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
<link href="/ehviews/Public/home/css/simplestyle.css" rel="stylesheet">


<!-- 公共js -->
<script src="/ehviews/Public/static/jquery-1.10.2.min.js"></script>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
<!--[if lt IE 9]>
      <script src="/ehviews/Public/static/html5.js"></script>
      <script src="/ehviews/Public/static/respond.min.js"></script>
<![endif]-->

<script src="/ehviews/Public/home/Js/core.js"></script>
<script src="/ehviews/Public/static/layer/layer.js"></script>
<script src="/ehviews/Public/static/bootstrapTags/bootstrap-tags.js"></script>


<script>
var _STATIC_ = "/ehviews/Public/static";
var _APP_="/ehviews/index.php";
var _PUBLIC_="/ehviews/Public";
$(function(){

	initUI();
	if("<?php echo ($zswinerror); ?>"){
		
		var url="<?php echo ($jumpUrl); ?>";
		
		layer.statusinfo("<?php echo ($error); ?>",'error',urllocation,url,"<?php echo ($waitSecond); ?>");
	
	}
	
	
	
});


</script>


</head>

<body>

<div class="top-menu-wrap">
<div class="container" style="position: relative"><!-- logo -->
<div class="logo hidden-xs"><a href="<?php echo U('Index/index');?>"></a></div>
<!-- end logo --> <!-- 导航 -->






<div class="top-nav navbar">
<div class="navbar-header">
<button class="navbar-toggle pull-left" data-toggle="collapse"	data-target=".navbar-collapse"><span class="icon-bar"></span>
<span class="icon-bar"></span> <span class="icon-bar"></span></button>
</div>
<nav role="navigation"
	class="collapse navbar-collapse bs-navbar-collapse active">
<ul class="nav nav-pills ml30 mt10">
	<?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?><li><a target="<?php echo ($nav["target"]); ?>" href="<?php echo ($nav["url"]); ?>" <?php if($nav['active'] == 1): ?>class="active"<?php endif; ?>><?php echo ($nav["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
	<?php if(is_array($nosigncate)): $i = 0; $__LIST__ = $nosigncate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><li class="visible-xs">
	<a	href="<?php echo ZSU('/artlist/'.$vo1['id'],'Index/artlist',array('cid'=>$vo1['id']));?>">
	<?php echo ($vo1["name"]); ?> </a></li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
</nav></div>
<!-- end 导航 --> 
<?php if($user_auth['uid'] > 0): ?><ul class="opts pull-right list-inline">
	<li><?php if(($roleauth['yesart'] == 1) OR ($isadmin)): ?><div class="mt10 ml20"><a href="<?php echo U('Ucenter/artadd');?>"
		class="btn btn-primary">发布 </a></div><?php endif; ?></li>

	<li class="mt10"><a href="javascript:void(0);"
		data-toggle="dropdown" title="<?php echo ($userinfo['nickname']); ?>个人中心"> <?php if($userinfo['mymailcount'] > 0): ?><span
		class="btn-danger badge"
		style="position: absolute; top: 5px; right: 9px;"><?php echo ($userinfo['mymailcount']); ?></span><?php endif; ?>
	<img border="0" src="<?php echo ($userinfo['avatar32']); ?>"
		alt="<?php echo ($userinfo['nickname']); ?>"> </a>

	<ul class="dropdown-menu dropdown-menu-right">
		<li><a href="<?php echo U('Ucenter/index');?>"><i class="icon-cog"></i>
		个人设置</a></li>
		<li><a
			href="<?php echo ZSU('/userart/'.$userinfo['uid'],'Ucenter/userart',array('uid'=>$userinfo['uid']));?>">
			<i	class="icon-file-text-alt"></i> 我的文章</a></li>
		<li><a
			href="<?php echo ZSU('/usersc/'.$userinfo['uid'],'Ucenter/usersc',array('uid'=>$userinfo['uid']));?>">
			<i	class="icon-bookmark"></i> 我的收藏</a></li>
		<li><a href="<?php echo ZSU('/userfocus/','Ucenter/userfocus');?>">
		<i	class="icon-heart"></i> 我的关注</a></li>

		<li><a href="<?php echo U('Ucenter/usermail');?>">
		<i	class="icon-envelope"></i> 我的消息 <?php if($userinfo['mymailcount'] > 0): ?><span	class="btn-danger badge"><?php echo ($userinfo['mymailcount']); ?></span><?php endif; ?></a></li>


		<?php if($isadmin == true): ?><li><a href="<?php echo $_SERVER['SCRIPT_NAME'];?>?m=Admin"><i
			class="icon-suitcase"></i> 管理后台</a></li><?php endif; ?>
		<li><a href="<?php echo U('User/logout');?>" <?php if($cname == 'ucenter'): ?>jumpurl="<?php echo U('Index/index');?>"<?php endif; ?> target="AjaxTodo"><i class="icon-signout"></i> 注销登录</a></li>
	</ul>
	</li>
</ul>





<?php else: ?>
<div class="user-nav"><a class="login btn btn-normal btn-primary"
	href="<?php echo U('User/login');?>">登录</a> <a
	class="register btn btn-normal btn-success"
	href="<?php echo U('User/register');?>">注册</a></div><?php endif; ?> <!-- 搜索框 -->
<div class="search-box  ">
<form class="navbar-search" action="<?php echo U('Index/search');?>" id="global_search_form" method="post">
	<input	class="form-control search-query" type="text" placeholder="搜索" autocomplete="on" name="keyword" id="keyword"	value="<?php echo ($_REQUEST['keyword']); ?>"> 
	<span title="搜索"	id="global_search_btns" onclick="$('#global_search_form').submit();">
	<i class="icon icon-search"></i></span></form>

</div>
<!-- end 搜索框 --></div>
</div>

<div class="wrap maincontent">

<div class="container">
<div class="row">



<div class="col-xs-12 col-md-9 main mt30">
<div class="panel panel-default panel-archive">
<div class="panel-body">
<h3 class="post-title">所有标签</h3>		
<div style="min-height:300px;">
<ul class="taglist--inline pull-left">
	
<?php $map=array('id desc','','50','','1',);$data = callApi("Tag/getTags",$map);$__LIST__ = $data['data']; if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="tagPopup">
	<a class="tag"  href="<?php echo ZSU('/tagart/'.$vo['id'],'Index/tagart',array('id'=>$vo['id']));;?>" >
	<?php echo ($vo["title"]); ?> (<?php echo ($vo["num"]); ?>)</a></li><?php endforeach; endif; else: echo "" ;endif; ?>	
	
</ul>
</div>	 
<div class="text-center">
<?php $map=array('1',);$data = callApi("Tag/getTagsCount",$map);$count = $data['data'];$__PAGE__ = new \Think\Page($count, 50);echo $__PAGE__->show(); ?>
 </div>		
</div>

	
</div>

</div>	 


<div class="col-xs-12 col-md-3 mt30 side hidden-xs ">
         

                 <div class="widget-box clearfix">
                    <h2 class="h4 widget-box__title">分类列表(<?php echo ($clistnum); ?>)</h2>
                    <div class="pcss3mm ">
<ul id="pcss3mm" class="nav nav-pills" role="tablist">

<?php echo ($catehtml); ?>
</ul>
</div>
                    
                    
                  
                </div>
                                <div class="widget-box clearfix">
                    <h2 class="h4 widget-box__title">推荐用户</h2>
                    <ul class="list-unstyled list-unstyled">
                    
                    
                    <?php $map=array('last_login_time desc','','15','true',);$data = callApi("Member/getMember",$map);$__LIST__ = $data['data']; if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="widget-user media">
                          
                            <a class="pull-left" href="<?php echo ($vo["user"]["space_url"]); ?>">
                                <img class="media-object avatar-40" src="<?php echo ($vo["user"]["avatar64"]); ?>" alt="<?php echo ($vo["user"]["nickname"]); ?>" title="<?php echo ($vo["user"]["nickname"]); ?>">
                            </a>
                         
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                </div>
                                                <div class="widget-box clearfix">
                    <h2 class="h4 widget-box__title">热门标签</h2>
                    <ul class="taglist--block">
                    <?php $map=array('num desc','','15','true','1',);$data = callApi("Tag/getTags",$map);$__LIST__ = $data['data']; if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="mr10 tagPopup">
                            <a class="tag" href="<?php echo ZSU('/tagart/'.$vo['id'],'Index/tagart',array('id'=>$vo['id']));?>" ><?php echo ($vo["title"]); ?></a>
                           
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                </div>
                <div class="widget-box no-border">
                    <h2 class="h4 widget-box__title">热门文章</h2>
                    <ul class="widget-links list-unstyled">
                    
                    <?php $map=array('0','true','0','1','view desc,id desc','','5','','','','true','',);$data = callApi("Art/getArt",$map);$__LIST__ = $data['data']; if(is_array($__LIST__)): $i = 0; $__LIST__ = $__LIST__;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="widget-links__item">
                   <a href="<?php echo ZSU('/artc/'.$vo['id'],'Index/artc',array('id'=>$vo['id']));?>" title="<?php echo ($vo["title"]); ?>">
<?php echo (cutstr_html($vo["title"],20)); ?></a>
                                    <small class="text-muted">
                                                                                    <?php echo ($vo["sccount"]); ?> 收藏，
                                                                                <?php echo ($vo["view"]); ?> 浏览
                                    </small>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                            </ul>
                </div>
                <?php echo hook('Advs', 'below_sidebar');?>
                
                            </div><!-- /.layout-sidebar -->

</div>
</div>
</div>
<footer id="footer">
<div class="container">
<div class="row hidden-xs">
<?php if(($cname == 'index') AND ($aname == 'index')): echo hook('friendLink'); endif; ?>    
</div>
<div class="copyright">
Copyright © 2015-2019 <a href="http://www.zswin.cn/" rel="nofollow">zswin</a>. <br><a href="http://www.miibeian.gov.cn/" rel="nofollow"><?php echo C('WEB_SITE_ICP');?></a> <?php echo hook('pageFooter');?>
</div>
   
</div>
</footer>


</body>
</html>