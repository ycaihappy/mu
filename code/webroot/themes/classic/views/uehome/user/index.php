<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>会员首页</p>
</div>

	<div class="m-form">
		
		<table cellspacing="0" cellpadding="0" border="0" class="table-field">
 
		<tr>
        <td class="label">用户名：</td><td><?php echo $user->user_name;?></td><td class="label">昵称：</td><td><?php echo $user->user_nickname;?></td>
		</tr>
		<tr>
        <td class="label">手机号：</td><td><?php echo $user->user_mobile_no;?></td><td class="label">邮箱：</td><td><?php echo $user->user_email;?></td>
		</tr>
	
		<tr><td colspan="4" align="right"><a class="edit" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/detail');?>">[编辑]</a></td></tr>

		</table>
		
		<table cellspacing="0" cellpadding="0" border="0" class="table-field">
 
		<tr>
        <td class="label">企业名称：</td><td><?php echo $enterprise->ent_name;?></td><td class="label">联络人：</td><td><?php echo $enterprise->ent_chief;?></td>
		</tr>
		<tr>
        <td class="label">公司类型：</td><td><?php echo ($enterprise->ent_type !=0)? $ent_type[$enterprise->ent_type] : "不限";?></td><td class="label">业务类型：</td><td><?php echo ($enterprise->ent_business_model) ? $business_type[$enterprise->ent_business_model] : "不限";?></td>
		</tr>

		<tr>
        <td class="label">注册资金：</td><td><?php echo $enterprise->ent_registered_capital."万元";?></td>
		<td class="label"> 
		<?php if($user->user_status==1 && $user->user_open_template && $user->user_template && $enterprise->ent_status==1): ?>
            	旺铺地址：
            	<?php else:?>
            	网址：
            <?php endif;?></td>
			<td>
			<?php if($user->user_status==1 && $user->user_open_template && $user->user_template && $enterprise->ent_status==1): ?>
            	<a target="_blank" href="<?php echo $this->createUrl('/storeFront/default/index',array('username'=>$user->user_name))?>"><?php echo $this->createUrl('/storeFront/default/index',array('username'=>$user->user_name))?></a>
            	<?php else:?>
            	<a target="_blank" href="<?php echo $enterprise->ent_website;?>"><?php echo $enterprise->ent_website;?></a>
            <?php endif;?>
			</td>
		</tr>
		<tr>
        <td class="label">地址：</td><td><?php echo $enterprise->ent_location;?></td><td class="label">传真：</td><td><?php echo $enterprise->ent_tax;?></td>
		</tr>
		<tr>
        <td class="label">公司简介：</td>
		<td colspan="3">
		<div class="info">
			<?php 
				echo $enterprise->ent_introduce;
			?>
		</div>
		</td>
		</tr>
		
		<tr><td colspan="4" align="right"><a class="edit" href="<?php echo Yii::app()->controller->createUrl('/uehome/user/company');?>">[编辑]</a></td></tr>

		</table>
		
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