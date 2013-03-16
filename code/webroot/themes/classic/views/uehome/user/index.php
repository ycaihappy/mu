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
            <div class="item"><label>企业名称：</label><?php echo $enterprise->ent_name;?></div><div class="item"><label>联络人：</label><?php echo $enterprise->ent_chief;?></div>
			</li>
			<li>

            <div class="item"><label>公司类型：</label><?php echo ($enterprise->ent_type !=0)? $ent_type[$enterprise->ent_type] : "不限";?></div><div class="item"><label>业务类型：</label><?php echo ($enterprise->ent_business_model) ? $business_type[$enterprise->ent_business_model] : "不限";?></div>

			</li>
			<li>
            <div class="item"><label>注册资金：</label><?php echo $enterprise->ent_registered_capital."万元";?></div><div class="item">
            
            <?php if($user->user_status==1 && $user->user_open_template && $user->user_template && $enterprise->ent_status==1): ?>
            	<label>旺铺地址：</label><a target="_blank" href="<?php echo $this->createUrl('/storeFront/default/index',array('username'=>$user->user_name))?>"><?php echo Yii::app()->request->getHostInfo().$this->createUrl('/storeFront/default/index',array('username'=>$user->user_name))?></a>
            	<?php else:?>
            	<label>网址：</label><a target="_blank" href="<?php echo $enterprise->ent_website;?>"><?php echo $enterprise->ent_website;?></a>
            <?php endif;?>
            </div>
			</li>
			<li>
            <div class="item"><label>地址：</label><?php echo $enterprise->ent_location;?></div><div class="item"><label>传真：</label><?php echo $enterprise->ent_tax;?></div>
			</li>
			<li>
				<div class="item">
				<label>公司简介：</label>
					<div class="info">
<?php 
echo $enterprise->ent_introduce;
?>
				</div>
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
