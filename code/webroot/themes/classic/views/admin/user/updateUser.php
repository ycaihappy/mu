<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUer'),
	'会员管理'=>array('manageUser'),
	'修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php echo $form->hiddenField($model,'user_id');?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">用户名：</td>
		<td><?php echo $form->textField($model,'user_name',array('class'=>'cmp-input','readOnly'=>'readOnly')); ?>
		<?php echo $form->hiddenField($model,'user_pwd');?>
		</td>
</tr>
<tr>
<td class="label">所属企业：</td>
		<td><input type=text disabled="disabled" class='cmp-input' value="<?php echo $model->enterprise->ent_name;?>"/>
	</td>
</tr>
<tr>
<td class="label">姓名：</td>
		<td>
		<?php echo $form->textField($model,'user_first_name');?>
		<?php echo $form->error($model,'user_first_name'); ?></td>
</tr>
<tr>
<td class="label">昵称：</td>
		<td>
		<?php echo $form->textField($model,'user_nickname');?>
		<?php echo $form->error($model,'user_nickname'); ?>
		</td>
</tr>

<tr>
<td class="label">邮箱：</td>
		<td>
		<?php echo $form->textField($model,'user_email');?>
		<?php echo $form->error($model,'user_email'); ?></td>
</tr>
<tr>
<td class="label">目前积分：</td>
		<td>
		<?php echo $form->textField($model,'user_point',array('disabled'=>'disabled'));?>
		</td>
</tr>
<tr>
<td class="label">手机号码：</td>
		<td>
		<?php echo $form->textField($model,'user_mobile_no');?>
		<?php echo $form->error($model,'user_mobile_no'); ?>
		</td>
</tr>
<tr>
<td class="label">手机号码：</td>
		<td>
		<?php echo $form->textField($model,'user_telephone');?>
		<?php echo $form->error($model,'user_telephone'); ?>
		</td>
</tr>
<tr>
<td class="label">地点：</td>
		<td><?php echo $form->dropDownList($model,'user_province_id',$allProvince,array(
			'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#User_user_city_id',
                    'data'=>array('province_id'=>"js:this.value")
				),
		)); ?>  <?php echo $form->dropDownList($model,'user_city_id',$allCity); ?>
		<?php echo $form->error($model,'user_province_id'); ?><?php echo $form->error($model,'user_city_id'); ?></td>
</tr>
<tr>
<td class="label">是否开启旺铺模板：</td>
		<td><?php echo $form->checkBox($model,'user_open_template',array('value'=>1)); ?>
		<?php echo $form->error($model,'user_open_template'); ?></td>
</tr>
<tr>
<td class="label">旺铺模板：</td>
		<td><?php echo $form->dropDownList($model,'user_template',$userTemplate,array('empty'=>'选择旺铺模板')); ?>
		<?php echo $form->error($model,'user_template'); ?></td>
</tr>
<tr>
<td class="label">会员等级：</td>
		<td><?php echo $form->dropDownList($model,'user_type',$userType,array('empty'=>'选择会员等级')); ?>
		<?php echo $form->error($model,'user_type'); ?></td>
</tr>
<tr>
<td class="label">是否订阅：</td>
		<td><?php echo $form->checkBox($model,'user_subscribe',array('value'=>1)); ?>
		<?php echo $form->error($model,'user_subscribe'); ?></td>
</tr>
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
<td></td>
<td ><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->