		
		<div class="m-qk-login">
		<?php if(Yii::app()->user->isGuest):?>
			<!--<div class="bd">
				<form name="qklogin" action="<?php echo $this->getController()->createUrl('/uehome/user/ajaxLogin')?>">
				<ul>
					<li><label>用户名：</label><div class="fields"><input type="text" name="UserLoginForm[username]" /></div></li>
					<li><label>密码：</label><div class="fields"><input type="password" name="UserLoginForm[password]"  /></div></li>
					<li><div class="btn"><a href="<?php echo $this->getController()->createUrl('/uehome/user/findPwd')?>" class="forget">找回密码?</a> <button type="button" class="btn-red">登 录</button></div></li>
					
				</ul>
				</form>
			</div>-->
			<?php endif;?>
			<div class="hd">
				<span>服务导航</span>
			</div>
<?php if (Yii::app()->user->getID()):?>
			<div class="bd logined">
				
				<ul>
                    <li><i class="link-msg"></i><a href="<?php echo $this->getController()->createUrl('/uehome/user/message');?>">站内短信</a></li>
<?php if (Yii::app()->user->getUserStatus() == 1)
{
?>
					<li><i class="link-shop"></i><a href="<?php echo $this->getController()->createUrl('/storeFront/default/index',array('username'=>$user_name));?>">我的旺铺</a></li>
<?php
}
else
{
?>
					<li><i class="link-shop"></i><a href="<?php echo $this->getController()->createUrl('/uehome/user/index');?>">会员中心</a></li>
<?php 
}
?>
					<li><i class="link-member"></i><a href="<?php echo $this->getController()->createUrl('/uehome/user/glist');?>">我的现货</a></li>
					<li><i class="link-product"></i><a href="<?php echo $this->getController()->createUrl('/uehome/user/slist');?>">我的供求</a></li>
				</ul>
			</div>
<?php endif;?>
			<div class="ft">
				<div class="line"></div>
<?php foreach ($slist as $s_one) {
    $class_arr = array('ico-2','ico-1','ico-3','ico-4');
    $class = $class_arr[array_rand($class_arr)];
?>
<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>$s_one->art_id))?>" class="btn-purple"><i class="<?php echo $class;?>"></i><?php echo $stype[$s_one->art_subcategory_id];?></a>
<?php } ?>
			</div>
			
			<div class="ad">
			<?php if(@$adv):?>
		<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
		
		<img width="210" height="105" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>"></a>
		<?php endif;?>
		</div>

		
		</div>
