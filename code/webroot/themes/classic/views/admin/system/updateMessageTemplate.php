<?php 
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'邮件信息模板管理'=>array('manageMessageTemplate'),
	'添加/修改',
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
<td class="label">模板名称*：</td>
		<td><?php echo $form->textField($model,'msg_template_name',array('class'=>'cmp-input')); ?>
		<?php if($model->msg_template_id): echo $form->hiddenField($model,'msg_template_id');endif;?>
		<?php echo $form->error($model,'msg_template_name'); ?></td>
</tr>

<tr>
<td class="label">模板助记符*：</td>
		<td><?php echo $form->textField($model,'msg_template_mnemonic',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'msg_template_mnemonic'); ?>
</tr>
<tr>
<td class="label">模板类型*：</td>
		<td><?php echo $form->dropDownList($model,'msg_template_type',$templateType); ?>
		<?php echo $form->error($model,'msg_template_type'); ?></td>
</tr>
<tr>
<td class="label">模板标题：</td>
		<td><?php echo $form->textField($model,'msg_template_title',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'msg_template_title'); ?></td>
</tr>
<tr>
<td class="label">模板内容：</td>
		<td><?php echo $form->textField($model,'msg_template_title',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'msg_template_title'); ?></td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<?php echo $form->textField($model,'msg_template_added_date',array('disabled'=>'disabled','class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->