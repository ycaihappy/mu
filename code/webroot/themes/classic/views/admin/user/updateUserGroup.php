<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUer'),
	'会员分组管理'=>array('manageUserTemplate'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'userTemplate-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php if(!$model->isNewRecord) echo $form->hiddenField($model,'group_id');?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">分组名称：</td>
		<td><?php echo $form->textField($model,'group_name',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'group_name');?>
		</td>
</tr>
<tr>
<td class="label">上传媒体：</td>
		<td>
		<?php echo CHtml::activeFileField($model,'group_logo'); ?>
		<div id="imgDiv">
			<?php if($model->group_logo) echo CHtml::image('/images/mushw/'.$model->group_logo,'',array('height'=>60))?>
        </div>
        <?php if(!$model->isNewRecord):?>
       	
        <?php echo CHtml::hiddenField('group_logo_hidden',$model->group_logo)?>
		
        <?php endif;?>
		</td>
</tr>
<tr>
<td class="label">分组描述：</td>
		<td>
		<?php echo $form->textArea($model,'group_description',array('style'=>'width:300px;height:150px'));?>
        </td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<input name="UserGroup[group_added_time]" disabled type=text class='cmp-input' value="<?php echo $model->group_added_time?$model->group_added_time:date('Y-m-d H:i:s');?>"/>		
        </td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'group_status',$groupStatus); ?>
		<?php echo $form->error($model,'group_status'); ?></td>
</tr>
<tr>
<td></td>
<td>><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
Yii::app()->getClientScript()->registerScriptFile('/js/jquery.uploadPreview.js');
$previewScript=<<<PREVIEW
$("#UserGroup_group_logo").uploadPreview({ width: 60, height: 60, imgDiv: "#imgDiv", imgType: ["bmp", "gif", "png", "jpg"] });
PREVIEW;
Yii::app()->getClientScript()->registerScript('UserGroup#uploadPreview',$previewScript);
?>