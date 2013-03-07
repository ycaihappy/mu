<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>钼市网-会员中心欢迎您！</title>
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
		  <a href="<?php echo $this->createUrl('/site/index')?>">返回首页</a> | <a href="<?php echo $this->createUrl('user/password')?>">修改密码</a> | <a href="<?php echo $this->createUrl('user/logout')?>">安全退出</a> 
	</p>	
	
</div>

</div>
    

    <div class="layout main">
        <?php $this->widget("UserTabWidget"); ?>
	
    	<div class="layout-area">
            <?php $this->widget("UserMenuWidget"); ?>
            <div class="col-r">
               <?php echo $content;?>
            </div>
        </div>
    
    	<div class="layout-area">
        <?php $this->widget("FooterWidget");?>
    	</div>
    
    </div>
    
</div>

<?php $this->widget("CommonFooterWidget"); ?>

</body>
</html>
