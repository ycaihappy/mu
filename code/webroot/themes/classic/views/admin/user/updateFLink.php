<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	'友情链接管理'=>array('manageFLink'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'flink-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">会员名：</td>
		<td>
			<input type=text disabled="disabled" class='cmp-input' value="<?php echo $model->user->user_name;?>"/>		
        <?php echo $form->hiddenField($model,'flink_user_id');?>
		</td>
</tr>

<tr>
<td class="label">名称：</td>
		<td><?php echo $form->textField($model,'flink_name',array('class'=>'cmp-input')); ?>
		<?php if($model->flink_id): echo $form->hiddenField($model,'flink_id');endif;?>
		<?php echo $form->error($model,'flink_name'); ?></td>
</tr>
<tr>
<td class="label">链接地址：</td>
		<td><?php echo $form->textField($model,'flink_url'); ?>
		<?php echo $form->error($model,'flink_url'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'flink_status',$flinkStatus); ?>
		<?php echo $form->error($model,'flink_status'); ?></td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<input name="FriendLink[flink_create_date]" disabled type=text class='cmp-input' value="<?php echo $model->flink_create_date?$model->flink_create_date:date('Y-m-d H:i:s');?>"/>		
        <?php echo $form->error($model,'flink_create_date'); ?></td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->