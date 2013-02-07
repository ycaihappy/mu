    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>企业动态</p>
</div>
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'news-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
			<td class="label">标题：</td><td><?php echo $form->textField($model, 'art_title', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
			<td class="label">详细内容：</td><td><?php
$this->widget('application.extensions.ckeditor.CKEditor',array(

    "model"=>$model,

    "attribute"=>'art_content',

    "height"=>'400px',

    "width"=>'600px',

    'editorTemplate'=>'advanced',


));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
