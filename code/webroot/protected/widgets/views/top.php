<div class="m-top">
	<div class="layout">
	<p class="user-info">
	<?php if(Yii::app()->user->isGuest):?>
        <a href="<?php echo Yii::app()->controller->createUrl('uehome/user/login');?>">请登陆</a>
		<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/register');?>">免费注册 </a>
	<?php else:?>
		您好，<?php echo Yii::app()->user->getName()?> ！ <a href="<?php echo Yii::app()->controller->createUrl('uehome/user/logout');?>">[退出]</a>
	<?php endif;?>
	</p>
	<p class="site-tool">
		<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/index');?>">会员中心</a>
		<!--<span>|</span>
		<a href="">找回密码</a> -->
		<span>|</span>
		<a href="">网站地图</a>
		<span>|</span>
		<a href="">联系客服</a>
		<span>|</span>
		<a href="">收藏本站</a>
	</p>
	</div>
</div>
