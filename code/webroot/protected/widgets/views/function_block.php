		<div class="m-qk-entry right">
			<div class="hd">
				<span><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/register');?>">免费注册</a></span>
				<span><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/login');?>">登陆</a></span>
				<span><a href="<?php echo Yii::app()->controller->createUrl('product/index');?>">现货专区</a></span>
			</div>
			<div class="bd">
				<ul>
					<li><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/goods');?>"><i class="qk-1"></i>发布现货</a><s></s><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/supply');?>"><i class="qk-2"></i>发布求购</a><div class="qk-b"></div></li>
					<li><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/templateSetting');?>"><i class="qk-3"></i>企业商铺</a><s></s><a href="<?php echo Yii::app()->controller->createUrl('uehome/user/goods');?>"><i class="qk-4"></i>发布特价</a><div class="qk-b"></div></li>
					<li class="last"><a href="<?php echo Yii::app()->controller->createUrl('/product/index');?>"><i class="qk-5"></i>我要找货</a><s></s><a><i class="qk-6"></i>会员服务</a></li>
				</ul>
			</div>
			<div class="ft">
				<a><img src="images/ad_1.jpg" /></a>
			</div>
			
		</div>
