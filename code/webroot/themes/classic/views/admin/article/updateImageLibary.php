<?php 
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'图库管理'=>array('manageImageLibary'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php if($model->image_id): echo $form->hiddenField($model,'image_id');endif;?>

<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">图片标题：</td>
		<td><?php echo $form->textField($model,'image_title',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'image_title'); ?></td>
</tr>
<tr>
<td class="label">所属分类：</td>
		<td><?php echo $form->dropDownList($model,'image_used_type',$imageUsedType,array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'image_used_type'); ?></td>
</tr>
<tr>
<td class="label">上传图片：</td>
		<td>
		<?php echo CHtml::activeFileField($model,'image_src'); ?>
		<div id="imgDiv">
			<?php if($model->image_src) echo CHtml::image('images/commonProductsImages/'.$model->image_src,'',array('height'=>150))?>
        </div>
        <?php if(!$model->isNewRecord):?>
        <?php echo CHtml::hiddenField('image_src_2',$model->image_src)?>
		<?php echo CHtml::hiddenField('image_thumb_src_2',$model->image_thumb_src)?>
        <?php endif;?>
		</td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'image_status',$imageStatus); ?>
		<?php echo $form->error($model,'image_status'); ?></td>
</tr>
<tr>
<td class="label">上传人：</td>
		<td>
		<input name="image_added_by" readOnly="readOnly" type=text class='cmp-input' value="<?php echo $model->image_added_by?$model->createUser->user_name:Yii::app()->admin->getName();?>"/>		
        <?php if($model->image_id): echo $form->hiddenField($model,'image_added_by');endif;?></td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<input name="image_added_time" disabled type=text class='cmp-input' value="<?php echo $model->image_added_time?$model->image_added_time:date('Y-m-d H:i:s');?>"/>	
		<?php if($model->image_id): echo $form->hiddenField($model,'image_added_time');endif;?>
		</td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
Yii::app()->getClientScript()->registerScriptFile('js/jquery.uploadPreview.js');
$previewScript=<<<PREVIEW
$("#ImageLibrary_image_src").uploadPreview({ width: 200, height: 200, imgDiv: "#imgDiv", imgType: ["bmp", "gif", "png", "jpg"] });
PREVIEW;
Yii::app()->getClientScript()->registerScript('ImageLibary#uploadPreview',$previewScript);
?>