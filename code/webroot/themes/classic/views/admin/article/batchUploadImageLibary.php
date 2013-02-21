<?php 
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'图库管理'=>array('manageImageLibary'),
	'批量上传图片',
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
<?php if($model->image_id): echo $form->hiddenField($model,'image_id');endif;?>

<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">所属分类：</td>
		<td><?php echo $form->dropDownList($model,'image_used_type',$imageUsedType,array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'image_used_type'); ?></td>
</tr>
<tr>
<td class="label">上传图片：</td>
<td>
		<div id="queue"></div>
		<input id="file_upload" name="file_upload" type="file" multiple="true"/>
		<div id="uploadImageQueue"></div>
		</td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerScriptFile('js/jquery.uploadify.min.js');
$cs->registerCssFile('css/uploadify.css');
$timestamp=time();
$token=md5('unique_salt' . $timestamp);
$uploader=Yii::app()->controller->createUrl('batchUploadImage');
$uploadScript=<<<UPLOAD
$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '{$timestamp}',
					'token'     : '{$token}'
				},
				'height':30,
				'width':120,
				'queueID' :'uploadImageQueue',
				'swf'      : 'css/uploadify.swf',
				'uploadScript' : '{$uploader}',
				'buttonText':'选择图片',
				'fileTypeExts':'*.bmp;*.gif;*.jpg;*.png',
			});
UPLOAD;
$cs->registerScript('batchUpload#saveOrUpdate',$uploadScript);
?>