	<div class="member-top">
	<div class="m-logo clearfix">
		<a target="_self" href="<?php echo Yii::app()->controller->createUrl('/site/index');?>" class="logo"><img title="钼市网 - 会员中心" alt="钼市网 - 会员中心" src="/images/member_logo.gif"></a>
	</div>
	<div class="m-user-top">
	
	<p class="user-info">
        欢迎光临钼市网, <?php echo $name;?>| <a href="<?php echo Yii::app()->controller->createUrl('/site/index');?>">返回首页</a> | <a href="<?php echo Yii::app()->controller->createUrl('user/password')?>">修改密码</a> | <a href="<?php echo Yii::app()->controller->createUrl('user/logout')?>">安全退出</a> 
	</p>
	</div>