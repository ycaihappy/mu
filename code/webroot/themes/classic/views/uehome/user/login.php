<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>login</title>
    <link rel="stylesheet" href="css/global.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>

<body>


<div id="p_login" class="pg-layout">


<div class="layout head">
	<div class="m-logo clearfix">
		<a target="_self" href="" class="logo"><img title="mushw.com - 钼市网会员登陆" alt="zzz" src="images/login_logo.png"></a>
	</div>

</div>

<div class="layout main">
	<div class="layout-area">
	
	
	<div class="m-login" id="J_Login">
		
		<div class="img"><img src="images/login_img.png" /></div>
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
						<td><div class="login-btns"><button tabindex="5" class="btn-login" type="submit">登录</button><a href="" class="btn-reg">注册</a></div></td>
					</tr>
				</table>
				<?php $this->endWidget(); ?>
			</div>
		</div>
	
	</div>
	
	
	</div>

	
	
	<div class="layout-area">
		<div class="m-footer">
		<p class="first"><a>公司简介</a> | <a>广告服务</a> | <a>联系方式</a> | <a>服务项目</a> | <a>公司动态</a> | <a>工作机会</a> | <a>网站地图</a> | <a>公司简介</a> | <a>公司简介</a> | <a>公司简介</a></p>
		<p>客服热线：400-0000-0000  0766-1111111 / 11111111 / 1111111 传真：0443-11111111</p>
		<p>Copyright &copy; 1998 - 2012 中国XX网 All Rights Reserved</p>
		<p>全国咨询/投诉电话：400-000-0000   E-mail:kf@xxxx.com ICP证1003232</p>
		
		<p class="fa"> <a class="fa1" target="_blank" href="http://www.cqc.com.cn"></a> <a class="fa2" target="_blank" href="http://www.smestar.com/detail.credit?action=preLevel&amp;credcode=NO.20000001143"></a> <a class="fa3" target="_blank" href="http://www.e-315.org"></a> <a class="fa4" target="_blank" href="http://www.isc.org.cn"></a> <a class="fa5" target="_blank" href="http://www.ec.org.cn"></a> <a class="fa6" target="_blank" href="https://www.itrust.org.cn/yz/pjwx.asp?wm=1697657781"></a> 
	</p>
		
		</div>
	</div>
	

</div>
</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerScriptFile('js/config.js');
$cs->registerScriptFile('js/admin.js');
$cs->registerScriptFile('js/init.js');
?>
</body>
</html>
