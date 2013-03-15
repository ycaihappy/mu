<?php 
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'钼相关稀土价格'=>array('manageRelativeRePrice'),
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
<td class="label">品名*：</td>
		<td><?php echo $form->textField($model,'re_name',array('class'=>'cmp-input')); ?>
		<?php if($model->re_id): echo $form->hiddenField($model,'re_id');endif;?>
		<?php echo $form->error($model,'re_name'); ?></td>
</tr>

<tr>
<td class="label">所属市场*：</td>
		<td><?php echo $form->textField($model,'re_market',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'re_market'); ?>
</tr>
<tr>
<td class="label">价格*：</td>
		<td><?php echo $form->numberField($model,'re_price'); ?>元
		<?php echo $form->error($model,'re_price'); ?></td>
</tr>
<tr>
<td class="label">涨跌幅度：</td>
		<td><?php echo $form->dropDownList($model,'re_fallup',$allFallUp); ?> <?php echo $form->numberField($model,'re_margin',array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'re_status',$allStatus,array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->