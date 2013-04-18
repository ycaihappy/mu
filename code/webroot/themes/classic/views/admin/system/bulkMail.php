<?php 
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'群发邮件'=>array('manageMessageTemplate'),
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">过滤会员：</td>
		<td>
		<?php echo $form->dropDownList($model,'province',$allProvince,array('class'=>'cmp-input','multiple'=>true)); ?>
		<?php echo $form->dropDownList($model,'entBusinessModel',$allBusModel,array('class'=>'cmp-input','multiple'=>true)); ?>
		<?php echo $form->dropDownList($model,'userGroup',$allUserGroup,array('class'=>'cmp-input','multiple'=>true)); ?>
		</td>
</tr>

<tr>
<td class="label">发送方式：</td>
		<td><?php echo $form->textField($model,'sendType',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'sendType'); ?>
</tr>
<tr>
<td class="label">邮件标题：</td>
		<td><?php echo $form->textField($model,'mailSubject',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'mailSubject'); ?></td>
</tr>
<tr>
<td class="label">模板内容：</td>
		<td><?php
		$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'mailContent',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 400px;'),
				));
		?>
		<?php echo $form->error($model,'mailContent'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('发送邮件',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<br/>
<br/>
<br/>