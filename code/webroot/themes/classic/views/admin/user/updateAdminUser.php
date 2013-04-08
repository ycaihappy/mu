<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUer'),
	'管理员管理'=>array('manageAdminUser'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php echo $form->hiddenField($model,'user_id');?>
<?php echo $form->hiddenField($model,'user_type');?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">用户名：</td>
		<td><?php echo $form->textField($model,'user_name',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'user_name'); ?>
		</td>
</tr>

<tr>
<td class="label">密码：</td>
		<td>
		<input type="password" value="" name="user_pwd_1" class="cmp-input"/>
		<?php if(!$model->getIsNewRecord()): ?>
		<em>如果无需修改密码请留空</em>
		<?php endif;?>
		<?php if(!$model->getIsNewRecord())echo $form->hiddenField($model,'user_pwd');?>
		</td>
</tr>

<tr>
<td class="label">姓名：</td>
		<td>
		<?php echo $form->textField($model,'user_first_name');?>
		<?php echo $form->error($model,'user_first_name'); ?></td>
</tr>
<tr>
<td class="label">手机号码：</td>
		<td>
		<?php echo $form->textField($model,'user_mobile_no');?>
		<?php echo $form->error($model,'user_mobile_no'); ?>
		</td>
</tr>
<!--<tr>
<td class="label">地点：</td>
		<td><?php //echo $form->dropDownList($model,'user_city_id',$allCity); ?>
		<?php //echo $form->error($model,'user_city_id'); ?></td>
</tr>  -->
<tr>
<td class="label">创建时间：</td>
		<td>
		<?php echo $form->textField($model,'user_join_date',array('readOnly'=>'readOnly'));?>
        <?php echo $form->error($model,'user_join_date'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'user_status',$userStatus); ?>
		<?php echo $form->error($model,'user_status'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->