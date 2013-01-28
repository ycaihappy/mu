<?php 
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'基本类别管理'=>array('manageTerm'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'term-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">名称：</td>
		<td><?php echo $form->textField($model,'term_name',array('class'=>'cmp-input')); ?>
		<?php if($model->term_id): echo $form->hiddenField($model,'term_id');endif;?>
		<?php echo $form->error($model,'term_name'); ?></td>
</tr>

<tr>
<td class="label">类型：</td>
		<td><?php echo $form->dropDownList($model,'term_group_id',$termGroup,array(
        'empty'=>'分组类型',
        'ajax'=>array(
                    'type'=>'GET',
                    'url'=>CController::createUrl('site/updateTerm'),
                    'update'=>'#Term_term_parent_id',
                    'data'=>array('group_id'=>"js:this.value",'type'=>'getTermByGroupId')
                ))); ?>
		<?php echo $form->error($model,'term_group_id'); ?></td>
</tr>
<tr>
<td class="label">父级：</td>
		<td><?php echo $form->dropDownList($model,'term_parent_id',$terms); ?>
		<?php echo $form->error($model,'term_parent_id'); ?></td>
</tr>
<tr>
<td class="label">slug：</td>
		<td><?php echo $form->textField($model,'term_slug'); ?>
		<?php echo $form->error($model,'term_slug'); ?></td>
</tr>
<tr>
<td class="label">排序：</td>
		<td><?php echo $form->textField($model,'term_order'); ?>
		<?php echo $form->error($model,'term_order'); ?></td>
<tr>
<tr><td colspan='2' align='right'>
		<?php echo CHtml::submitButton('保存',array('class'=>'btn-blue')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->