	<div class="m-breadcrumb">
	    <p><b class="crumb"></b>会员中心<i></i>添加图片</p>
    </div>
<?php
$error = $model->getErrors();
if ( !empty($error))
{
?>
<div class="block-error">
<?php
    foreach ($error as $one_error)
    {
?>
    <p><?php echo $one_error[0];?></p>
<?php
    }
?>
</div>
<?php
}
?>
	<div class="m-form" id="J_Cert_Add">
<?php	
    $form = $this->beginWidget(
        'CActiveForm',
        array(
            'id' => 'file-form',
            'enableAjaxValidation' => false,
            'htmlOptions' => array('enctype' => 'multipart/form-data'),
        )
    );
?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		
		<tr>
			<td class="label">标题：</td><td><?php echo $form->textField($model, 'file_title', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
			
		<tr>
			<td class="label">文件类型：</td><td><?php echo $form->dropDownList($model, 'file_type_id', $category);?></td>
		</tr>	
		<tr>
			<td class="label">文件描述：</td><td><?php echo $form->textArea($model,'file_content',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
        <td class="label">图片上传：</td><td><?php echo CHtml::activeFileField($model, 'file_url',array('class'=>'image-preview')); ?>
			<p>(图片大小不要超过200K，格式GIF,JPG,PNG图片宽度最大为220像素效果最佳！)</p>
			
                <br /><img src="<?php echo $model->file_url;?>" class="thumb"></td>
		</tr>
		
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>

<?php 

Yii::app()->getClientScript()->registerScriptFile('js/jquery.1.8.min.js');
Yii::app()->getClientScript()->registerScriptFile('js/jquery.uploadPreview.js');

?>
