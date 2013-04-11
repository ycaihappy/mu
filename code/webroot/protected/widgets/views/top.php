<div class="m-top">
	<div class="layout">
	<div class="user-info">
	<?php if(Yii::app()->user->isGuest):?>
       <!-- <a href="<?php echo Yii::app()->controller->createUrl('uehome/user/login');?>">请登陆</a>-->
	
			<div class="bd" id="J_QkLogin">
				<form name="qklogin" action="<?php echo $this->getController()->createUrl('/uehome/user/ajaxLogin');?>">
				<ul>
					<li><label>用户名：</label><div class="fields"><input type="text" name="UserLoginForm[username]" /></div></li>
					<li><label>密码：</label><div class="fields"><input type="password" name="UserLoginForm[password]"  /></div></li>
					<li><div class="btn"> <button type="button" class="btn-red">登 录</button> <a href="<?php echo $this->getController()->createUrl('/uehome/user/findPwd')?>" class="forget">找回密码?</a> | <a href="<?php echo Yii::app()->controller->createUrl('uehome/user/register');?>">免费注册</a></div></li>
					
				</ul>
				</form>
			</div>
			
			
			
		
	<?php else:?>
		您好，<?php echo Yii::app()->user->getName()?> ！ <a href="<?php echo Yii::app()->controller->createUrl('uehome/user/logout');?>">[退出]</a>
	<?php endif;?>
	</div>
	<div class="site-tool">
		<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/index');?>">会员中心</a>
		<!--<span>|</span>
		<a href="">找回密码</a> -->
		<span>|</span>
        <a href="<?php echo Yii::app()->controller->createUrl('site/map');?>">网站地图</a>
		<span>|</span>
		<a href="<?php echo Yii::app()->controller->createUrl('about/contact');?>">联系我们</a>
		<span>|</span>
		<a href="#" onclick="addfavorite();">收藏本站</a>
	</div>
	</div>
</div>
<script>
function addfavorite()
{
    if (document.all)
    {
        window.external.addFavorite('http://www.mushw.com:81','收藏夹');
    }
    else if (window.sidebar)
    {
        window.sidebar.addPanel('钼市网', 'http://www.mushw.com:81', "");
    }
} 
</script>
