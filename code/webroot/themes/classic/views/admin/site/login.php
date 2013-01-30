<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
</head>
<body>
	<div class="header-bar">
		<img class="logo" src="images/logo_admin.png" />
	</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loginForm',
	'htmlOptions'=>array('class'=>'loginContainer'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
		
		<h2 class="loginTitle" title="网站后台登陆">网站后台登陆</h2>
		<div class="user-id"> 
			<label>
				<strong class="userId-label" title="账号">账号</strong>
			</label>
			<?php echo $form->textField($model,'username',array('id'=>'userId')); ?>
		    <?php echo $form->error($model,'username'); ?>
		</div>
		
		<div class="user-pwd"> 
			<label>
				<strong class="userId-label" title="密码">密码</strong>
			</label>
			<?php echo $form->passwordField($model,'password',array('id'=>'userPwd')); ?>
		    <?php echo $form->error($model,'password'); ?>
		</div>
		
		<input type="button" class="g-button-submit" name="signIn" id="signIn" value="登录" />


<?php $this->endWidget(); ?>
</body>
<script src="js/jquery.1.8.min.js"></script>
<script src="js/login.js" type="text/javascript"></script>
</html>