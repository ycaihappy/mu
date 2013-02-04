<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'网站基本信息设置',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basicSiteInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">网站名称：</td>
		<td><?php echo $form->textField($model,'siteName',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'siteName'); ?></td>
</tr>

<tr>
<td class="label">网站标题：</td>
		<td><?php echo $form->textField($model,'siteTitle',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'siteTitle'); ?>
</tr>
<tr>
<td class="label">网站副标题：</td>
		<td><?php echo $form->textField($model,'siteSubtitle',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'siteSubtitle'); ?></td>
</tr>
<tr>
<td class="label">Logo地址：</td>
		<td><?php echo $form->textField($model,'siteLogo'); ?>
		<?php echo $form->error($model,'siteLogo'); ?></td>
</tr>
<tr>
<td class="label">网站URL：</td>
		<td><?php echo $form->textField($model,'siteUrl'); ?>
		<?php echo $form->error($model,'siteUrl'); ?></td>
</tr>
<tr>
<td class="label">网站备案信息代码：</td>
		<td><?php echo $form->textField($model,'siteIcpCode'); ?>
		<?php echo $form->error($model,'siteIcpCode'); ?></td>
</tr>
<tr>
<td class="label">公司名称：</td>
		<td><?php echo $form->textField($model,'companyName'); ?>
		<?php echo $form->error($model,'companyName'); ?></td>
</tr>
<tr>
<td class="label">客服热线：</td>
		<td><?php echo $form->textField($model,'csHotline'); ?>
		<?php echo $form->error($model,'csHotline'); ?></td>
</tr>
<tr>
<td class="label">销售热线：</td>
		<td><?php echo $form->textField($model,'sellHotline'); ?>
		<?php echo $form->error($model,'sellHotline'); ?></td>
</tr>
<tr>
<td class="label">网站客服QQ：</td>
		<td><?php echo $form->textField($model,'qq'); ?>
		<?php echo $form->error($model,'qq'); ?></td>
</tr>
<tr>
<td class="label">网站客服MSN：</td>
		<td><?php echo $form->textField($model,'siteMsgNum'); ?>
		<?php echo $form->error($model,'siteMsgNum'); ?></td>
</tr>
<tr>
<td class="label">网站客服邮箱：</td>
		<td><?php echo $form->textField($model,'csEmail'); ?>
		<?php echo $form->error($model,'csEmail'); ?></td>
</tr>
<tr>
<td class="label">网站描述：</td>
		<td>
				<?php 
		$this->widget('application.extensions.ckeditor.CKEditor',array( 
				    
		"model"=>$model,

		"attribute"=>'siteDescription',

		"height"=>'400px',
				    
		"width"=>'600px',       
				    
		'editorTemplate'=>'advanced',
		
		) 
);

?>
<?php echo $form->error($model,'ent_introduce'); ?>
		</td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->