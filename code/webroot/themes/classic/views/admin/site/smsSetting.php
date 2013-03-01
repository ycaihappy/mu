<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'短信设置',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'smssetting-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">短信平台登录ID：</td>
		<td><?php echo $form->textField($model,'uid',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'uid'); ?></td>
</tr>
<tr>
<td class="label">短信平台登录密码：</td>
		<td><?php echo $form->passwordField($model,'pwd',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'pwd'); ?>
</tr>
<tr>
<td class="label">短信发送号码：</td>
		<td><?php echo $form->textField($model,'sendor',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'sendor'); ?></td>
</tr>
<tr>
<td class="label">应用平台：</td>
		<td><?php echo $form->textField($model,'system',array('class'=>'cmp-input','readOnly'=>'readOnly')); ?></td>
</tr>
<tr>
<td class="label">注册验证短信模板：</td>
		<td><?php echo $form->dropDownList($model,'registeTemplate',$smsTemplates,array('empty'=>'请选择模板')); ?>
		<?php echo $form->error($model,'registeTemplate'); ?></td>
</tr>
<tr>
<td class="label">行情短信模板：</td>
		<td><?php echo $form->dropDownList($model,'priceTemplate',$smsTemplates,array('empty'=>'请选择模板')); ?>
		<?php echo $form->error($model,'priceTemplate'); ?></td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->