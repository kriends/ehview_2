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

<body style="background:#f3f3f3;">




<div class="container">
    <div class="header text-center">
        <h1>
            <a href="<?php echo U('Index/index');?>" class="logo1">
                <img src="/ehviews/Public/home/images/logouser.png" alt="ZswinBlog">
            </a>
        </h1>
        <p class="description text-muted"><?php echo C('WEB_SITE_DESCRIPTION');?></p>
    </div>
</div>


<div class="container">
    <div class="col-md-6 col-md-offset-3 bg-white login-wrap">
        <h1 class="h4 text-center login-title">登录账号</h1>
                <form method="post" role="form" id="user" target="formAjax" <?php if($isverify): ?>verify="1"<?php endif; ?> action="<?php echo U('User/login');?>">
            <input type="hidden" name="ref" value="">
            <div class="form-group">
                <label><i class="icon icon-user"></i> 用户名</label>
                <input type="text" class="form-control" name="username" placeholder="输入用户名/邮箱">
            </div>
          
            <div class="form-group">
                <label for=""><i class="icon icon-lock"></i> 密码</label>
                <input type="password" class="form-control" name="password" placeholder="不少于 6 位">
            </div>
            <?php if($isverify): ?><div class="form-group">
                <label><i class="icon icon-picture"></i> 验证码</label>
                <input type="text" class="form-control" id="verify" name="verify" placeholder="请输入下方的验证码" >
                <div class="mt10"><a id="reloadCaptcha" href="javascript:void(0)"><img class="verifyimg reloadverify" alt="点击切换" src="<?php echo U('Home/Home/verify');?>" alt="点击更换" title="点击更换" ></a></div>
            </div><?php endif; ?>
         <div class="checkbox">
          <label>
            <input type="checkbox" name="remember" value="on">
            记住登陆状态
          </label>
        </div>
        <?php echo hook('syncLogin');?>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg">登录</button>
            </div>
        </form>
    </div>


    <div class="text-center col-md-12 login-link">
        <a href="<?php echo U('User/register');?>">注册新账号</a>
        |
        <a href="<?php echo U('Index/index');?>">首页</a>
        |
        <a href="<?php echo U('User/mi');?>">找回密码</a>
    </div>
</div>




<script>
$(function(){
	//刷新验证码
	
    $(".reloadverify").click(function(){
    	changeverify();
     });
   
});
function changeverify(){

	var verifyimg = $(".verifyimg").attr("src");
	 if( verifyimg.indexOf('?')>0){
         $(".verifyimg").attr("src", verifyimg+'&random='+Math.random());
     }else{
         $(".verifyimg").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
     }
}
</script>

</body>
</html>