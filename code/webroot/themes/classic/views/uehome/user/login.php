<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="/css/global.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>

<body>


<div id="p_login" class="pg-layout">


<div class="layout head">
	<div class="m-logo clearfix">
		<a target="_self" href="<?php echo $this->createUrl('/site/index')?>" class="logo"><img title="mushw.com - 钼市网会员登陆" alt="zzz" src="/images/login_logo.png"></a>
	</div>

</div>

<div class="layout main">
	<div class="layout-area">
	
	
	<div class="m-login" id="J_Login">
		
		<div class="img"><img src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>" /></div>
		<div class="login-box">
			<div class="hd clearfix">
				<!--<span class="on"><a href="javascript:;">会员登录</a></span>-->
				<!--<span><a href="register.html">用户注册</a></span>-->
			</div>
			<div class="bd">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'htmlOptions'=>array('class'=>'loginContainer'),
				'enableClientValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
				),
			)); ?>
				<table>
					<tr>
						<td><label>账　号</label></td>
						<td><div class="field">
						<?php echo $form->textField($model,'username',array('id'=>'userId','placeholder'=>'用户名/手机/邮箱')); ?>
		   				<?php echo $form->error($model,'username'); ?></div></td>
					</tr>
					<tr>
						<td><label>密　码</label></td>
						<td><div class="field">
						<?php echo $form->passwordField($model,'password',array('id'=>'userPwd')); ?>
		    			<?php echo $form->error($model,'password'); ?></div></td>
					</tr>
					<?php if(CCaptcha::checkRequirements()): ?>
					<tr>
						<td><label>验证码</label></td>
						<td><div class="field">
						<?php echo $form->textField($model,'verifyCode',array('class'=>'small')); ?>
						<?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer;vertical-align:middle'))); ?>
                		<?php echo $form->error($model,'verifyCode'); ?>
                		</div></td>
					</tr>
					<?php endif;?>
					<tr>
						<td></td>
                        <td><div class="login-btns"><button tabindex="5" class="btn-login" type="submit">登录</button><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/register');?>" class="btn-reg">注册</a><br /><a href="<?php echo $this->createUrl('/uehome/user/findPwd')?>" class="forget">找回密码?</a></div></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	
	</div>
	
	
	</div>

	
	
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>
</div>
<?php $this->widget("CommonFooterWidget");?>
</body>
</html>
