<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUer'),
	'旺铺们模板管理'=>array('manageUserTemplate'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userTemplate-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php if(!$model->isNewRecord) echo $form->hiddenField($model,'temp_id');?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">模板名称：</td>
		<td><?php echo $form->textField($model,'temp_name',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'temp_name');?>
		
		</td>
</tr>
<tr>
<td class="label">模板文件目录：</td>
		<td>
		<?php echo $form->textField($model,'temp_dir');?>
		<?php echo $form->error($model,'temp_dir'); ?></td>
</tr>
<tr>
<td class="label">顺序：</td>
		<td>
		<?php echo $form->numberField($model,'temp_order');?>
		<?php echo $form->error($model,'temp_order'); ?>
		</td>
</tr>
<tr>
<td class="label">使用次数：</td>
		<td>
		<?php echo $form->numberField($model,'temp_amount',array('readOnly'=>'readOnly'));?>
		</td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<?php echo $form->textField($model,'temp_added_date',array('readOnly'=>'readOnly'));?>
        </td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'temp_status',$templateStatus); ?>
		<?php echo $form->error($model,'temp_status'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->