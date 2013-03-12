<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>会员首页</p>
</div>

	<div class="m-info">
	
		<ul>
			<li>
            <div class="item"><label>用户名：</label><?php echo $user->user_name;?></div><div class="item"><label>昵称：</label><?php echo $user->user_nickname;?></div>
			</li>
			<li>
            <div class="item"><label>手机号：</label><?php echo $user->user_mobile_no;?></div><div class="item"><label>邮箱：</label><?php echo $user->user_email;?></div>
			</li>
			<a class="edit" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/detail');?>">[编辑]</a>
		</ul>
		<ul>
		
		
			<li>
				<div class="item">
				<label>公司简介：</label>
					
				</div>
			</li>
            <a class="edit" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/company');?>">[编辑]</a>
		</ul>
		
		<ul class="pic">
			<li>
<?php 
if ( !empty($cert_list) ) 
{
foreach ($cert_list as $cert)
{
?>
				<div class="item">
                <p><?php echo $category[$cert['file_type_id']];?></p>
                <img src="<?php echo $cert['file_url'];?>" width="125" height="125" />					
				</div>
<?php
}
?>
				<div class="clearfix"></div>
			</li>
            <a class="edit" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/cert');?>">[编辑]</a>
<?php
}
?>
		</ul>
</div>
