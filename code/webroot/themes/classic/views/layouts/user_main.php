<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User Center</title>
    <link rel="stylesheet" href="css/global.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>

<body>


<div id="p_user_index" class="pg-layout">
<div class="layout head">
	<div class="m-logo clearfix">
		<a target="_self" href="" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="images/logo.jpg"></a>
	</div>
	<div class="m-user-top">
	
	<p class="user-info">
		  <a href="">返回首页</a> | <a href="">修改密码</a> | <a href="">安全退出</a> 
	</p>	
	
</div>

</div>
    

    <div class="layout main">
    	<div class="m-menubar">
		<p class="bar"><span class="on"><a href="">会员中心</a></span><span><a href="">业务管理</a></span></p>
	    </div>
	
    	<div class="layout-area">
            <?php $this->widget("UserMenuWidget"); ?>
            <div class="col-r">
               <div class="m-breadcrumb">
               <p><b class="crumb"></b>会员中心<i></i>会员管理</p>
               </div>
               <?php echo $content;?>
            </div>
        </div>
    
    	<div class="layout-area">
        <?php $this->widget("FooterWidget");?>
    	</div>
    
    </div>
    
</div>


<script src="js/jquery.1.8.min.js"></script>
<script src="js/config.js"></script>
<script src="js/global.js"></script>
<script src="js/init.js"></script>

</body>
</html>
