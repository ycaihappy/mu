<div class="m-top">
	
	<p class="user-info">
		欢迎<span><?php echo Yii::app()->admin->getName();?></span> | <a href="<?php echo Yii::app()->controller->createUrl("logout")?>">【退出】</a>
	</p>	
	
</div>

<div class="head">
	<div class="m-logo">
		<a target="_self" href="" class="logo"><img title="www.mushw.com - 钼市网管理后台" alt="钼市网" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_admin.png"></a>
	</div>
	<?php ?>
	<div class="m-nav">
		<a class="<?php echo $this->type==1?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index")?>">首页</a><i>|</i>
		<a class="<?php echo $this->type==2?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index",array('type'=>2))?>">用户管理</a><i>|</i>
		<a class="<?php echo $this->type==3?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index",array('type'=>3))?>">全部设置</a><i>|</i>
		<a class="<?php echo $this->type==4?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index",array('type'=>4))?>">信息管理 </a><i>|</i>
		<a class="<?php echo $this->type==5?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index",array('type'=>5))?>">新闻行情管理</a><i>|</i>
		<a class="<?php echo $this->type==6?'on':'' ?>" href="<?php echo Yii::app()->controller->createUrl("index",array('type'=>6))?>">广告及推荐管理</a><i>|</i>
		<a>系统</a>
	</div>
</div>