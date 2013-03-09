<?php 
$this->breadcrumbs=array(
	'全站设置'=>array('manageCity'),
	'地区管理'=>array('manageCity'),
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
<td class="label">名称：</td>
		<td><?php echo $form->textField($model,'city_name',array('class'=>'cmp-input')); ?>
		<?php if($model->city_id): echo $form->hiddenField($model,'city_id');endif;?>
		<?php echo $form->error($model,'city_name'); ?></td>
</tr>

<tr>
<td class="label">父级：</td>
		<td><?php echo $form->dropDownList($model,'city_parent',$allCity); ?>
		<?php echo $form->error($model,'city_parent'); ?>
</tr>
<tr>
<td class="label">是否显示：</td>
		<td><?php echo $form->checkBox($model,'city_open',array('value'=>1)); ?>
		<?php echo $form->error($model,'city_open'); ?></td>
</tr>
<tr>
<td class="label">钼相关：</td>
		<td><?php echo $form->checkBox($model,'city_mu',array('value'=>1)); ?>
		<?php echo $form->error($model,'city_mu'); ?></td>
</tr>
<tr>
<td class="label">排序：</td>
		<td><?php echo $form->textField($model,'city_order'); ?>
		<?php echo $form->error($model,'city_order'); ?></td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->