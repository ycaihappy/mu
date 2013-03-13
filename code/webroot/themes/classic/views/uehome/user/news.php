    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>企业动态</p>
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
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'news-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
        <?php echo $form->hiddenField($model, 'art_id');?>
		<tr>
			<td class="label">标题：</td><td><?php echo $form->textField($model, 'art_title', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">摘要：</td><td><?php echo $form->textArea($model,'art_intro',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
			<td class="label">详细内容：</td><td><?php
			$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'art_content',
				    'htmlOptions'=>array('class'=>'xheditor-mini','cols'=>80,'rows'=>20,'style'=>'width: 600px; height: 400px;'),
				));
/*$this->widget('application.extensions.ckeditor.CKEditor',array(

    "model"=>$model,

    "attribute"=>'art_content',

    "height"=>'400px',

    "width"=>'600px',

    'editorTemplate'=>'basic',


));
*/
?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
