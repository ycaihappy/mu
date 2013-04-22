<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'网站邮件设置',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basicSiteInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">SMTP服务器地址：</td>
		<td><?php echo $form->textField($model,'smtpServer',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'smtpServer'); ?></td>
</tr>

<tr>
<td class="label">SMTP服务器端口：</td>
		<td><?php echo $form->numberField($model,'smtpPort',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'smtpPort'); ?>
</tr>
<tr>
<td class="label">是否要求身份验证：</td>
		<td><?php echo $form->checkBox($model,'smtpRequireAuth',array('value'=>1)); ?>
		<?php echo $form->error($model,'smtpRequireAuth'); ?></td>
</tr>
<tr>
<td class="label">发信人邮箱地址：</td>
		<td><?php echo $form->emailField($model,'sendorEmail'); ?>
		<?php echo $form->error($model,'sendorEmail'); ?></td>
</tr>
<tr>
<td class="label">发信人称呼：</td>
		<td><?php echo $form->textField($model,'sendorName'); ?>
		<?php echo $form->error($model,'sendorName'); ?></td>
</tr>
<tr>
<td class="label">SMTP身份验证  用户名：</td>
		<td><?php echo $form->textField($model,'smtpUsername'); ?>
		<?php echo $form->error($model,'smtpUsername'); ?></td>
</tr>
<tr>
<td class="label">SMTP身份验证方式：</td>
		<td><?php echo $form->textField($model,'smtpAuthMethod'); ?>
		<?php echo $form->error($model,'smtpAuthMethod'); ?></td>
</tr>
<tr>
<td class="label">SMTP身份验证  密码：</td>
		<td><?php echo $form->passwordField($model,'smtpPassword'); ?>
		<?php echo $form->error($model,'smtpPassword'); ?></td>
</tr>
<tr>
<td class="label">测试电子邮箱：</td>
		<td><?php echo $form->emailField($model,'testEmail').'&nbsp;'; 
		$this->widget('zii.widgets.jui.CJuiButton',
			array(
				'name'=>'sendButton',
				'caption'=>'发送测试邮件',
				'value'=>'asd',
				'cssFile'=>'jquery.ui.css',
				'onclick'=>'js:function(){
				    var toEmail=$("#SiteEmailSetting_testEmail").val();
				    if($("#SiteEmailSetting_testEmail_em_").css("display")!="none")
				    {
				    	alert($("#SiteEmailSetting_testEmail_em_").text());
				    }
				    $.ajax({
				    				url:"'.Yii::app()->controller->createUrl("sendTestEmail").'",
		        					type:"POST",
		        					dataType:"json",
		        					data:{toEmail:toEmail},
		        					success:function(html){
		        						alert(html.message);
		        					},
		        					
		        				});
					return false;
				}',
				)
		);
		?>
		<?php echo $form->error($model,'testEmail'); ?>
		</td>
</tr>
<tr>
<td></td>
<td><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->