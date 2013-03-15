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
                <?php echo $form->error($model,'email'); ?>
            </div>
           
		<?php if(CCaptcha::checkRequirements()): ?>
        <div class="field-group captcha">
            <label for="captcha">验证码</label>
             <?php echo $form->textField($model, 'verifyCode', array('class'=>'f-text'));?>
            <?php $this->widget('CCaptcha',array('showRefreshButton'=>false,'clickableImage'=>true,'imageOptions'=>array('alt'=>'点击换图','title'=>'点击换图','style'=>'cursor:pointer;vertical-align:middle'))); ?>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
        <?php endif;?>
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
