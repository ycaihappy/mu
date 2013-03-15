<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>

<body>

<div id="p_forget_password" class="pg-layout">

<?php $this->widget('TopWidget');?>

<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="images/logo.jpg"></a>
	</div>
	<div class="logo-side-title"></div>
</div>

<div class="layout main">
	
	<div class="m-reset">
		<div class="mainbox">
        <h2>找回密码</h2>
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'findpwd-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
             <!--<form id="resetreq-form" method="post" action="/account/resetreq" class="common-form">-->
            <div class="field-group">
                <label for="reset-email">邮箱/手机号</label>
                <?php echo $form->textField($model, 'email', array('class'=>'f-text'));?>
            </div>
            
        <div class="field-group captcha">
            <label for="captcha">验证码</label>
            <input type="text" id="captcha" class="f-text" name="captcha" autocomplete="off">
            <img height="30px" width="60px" class="signup-captcha-img" id="signup-captcha-img" src="/account/captcha">
            <a tabindex="-1" class="captcha-refresh inline-link" href="javascript:void(0)">看不清楚？换一张</a>
        </div>
		<div class="field-group">
                <input type="submit" class="form-button" value="找回密码">
            </div>
<?php $this->endWidget();?>
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
