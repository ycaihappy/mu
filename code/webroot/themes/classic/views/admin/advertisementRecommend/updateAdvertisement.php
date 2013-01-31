<?php 
$this->breadcrumbs=array(
	'广告/推荐模块管理'=>array('manageAdvertisement'),
	'广告管理'=>array('manageAdvertisement'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'advertisement-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php echo $form->hiddenField($model,'ad_id');?>
<?php if($model->ad_id): echo $form->hiddenField($model,'ad_id');endif;?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">所属公司：</td>
		<td><input type=text disabled value="<?php echo $model->user->enterprise->ent_name;?>" />
		<?php echo $form->hiddenField($model,'ad_id',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'art_title'); ?></td>
</tr>
<tr>
<td class="label">标题：</td>
		<td><?php echo $form->textField($model,'ad_title',array('class'=>'cmp-input')); ?>
		
		<?php echo $form->error($model,'ad_title'); ?></td>
</tr>
<tr>
<td class="label">链接地址：</td>
		<td><?php echo $form->textField($model,'ad_link',array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'ad_link'); ?></td>
</tr>
<tr>
<tr>
<td class="label">广告位置：</td>
		<td><?php echo $form->dropDownList($model,'ad_no',$adPosition); ?>
		<?php echo $form->error($model,'ad_no'); ?></td>
</tr>
<tr>
<td class="label">媒体类型：</td>
		<td><?php echo $form->dropDownList($model,'ad_type',$adType); ?>
		<?php echo $form->error($model,'ad_type'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'ad_status',$adStatus); ?>
		<?php echo $form->error($model,'ad_status'); ?></td>
</tr>
<tr>
<td class="label">点击数：</td>
		<td><?php echo $form->textField($model,'ad_click_num',array('class'=>'cmp-input','readOnly'=>'readOnly')); ?>	
		</td>
</tr>
<tr>
<td class="label">广告起效时间：</td>
		<td>
		<?php echo $form->textField($model,'ad_start_date',array('class'=>'cmp-input')); ?>	
        <?php echo $form->error($model,'ad_start_date'); ?></td>
</tr>
<tr>
<td class="label">广告结束时间：</td>
		<td>
		<?php echo $form->textField($model,'ad_end_date',array('class'=>'cmp-input')); ?>	
        <?php echo $form->error($model,'ad_end_date'); ?></td>
</tr>
<tr>
<td class="label">上传媒体：</td>
		<td></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->