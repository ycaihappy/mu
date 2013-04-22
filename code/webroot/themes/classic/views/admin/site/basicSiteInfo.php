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
<td class="label">meta标题：</td>
		<td><?php echo $form->textField($model,'siteMetaTitle',array('class'=>'cmp-input','style'=>'width:300px')); ?><em>前14个字符搜索引擎索引权重最大</em>
		<?php echo $form->error($model,'siteMetaTitle'); ?>
</tr>
<tr>
<td class="label">meta关键词：</td>
		<td><?php echo $form->textField($model,'siteMetaKeyword',array('class'=>'cmp-input','style'=>'width:300px')); ?><em>关键字用英文格式的分隔符，如：_ , | 等，极限长度为255个字符</em>
		<?php echo $form->error($model,'siteMetaKeyword'); ?></td>
</tr>
<tr>
<td class="label">meta描述：</td>
		<td><?php echo $form->textArea($model,'siteMetaDescription',array('class'=>'cmp-input', 'wrap'=>"wrap",'style'=>'width:305px;height:50px')); ?>
		<?php echo $form->error($model,'siteMetaDescription'); ?></td>
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
<td class="label">地址：</td>
		<td><?php echo $form->textField($model,'location',array('style'=>'width:300px')); ?>
		<?php echo $form->error($model,'location'); ?></td>
</tr>
<tr>
<td class="label">邮编：</td>
		<td><?php echo $form->textField($model,'zipcode'); ?>
		<?php echo $form->error($model,'zipcode'); ?></td>
</tr>
<tr>
<td class="label">传真：</td>
		<td><?php echo $form->textField($model,'fax'); ?>
		<?php echo $form->error($model,'fax'); ?></td>
</tr>
<tr>
<td class="label">客服热线：</td>
		<td><?php echo $form->textField($model,'csHotline1'); ?>
		<?php echo $form->error($model,'csHotline1'); ?></td>
</tr>
<tr>
<td class="label"></td>
		<td><?php echo $form->textField($model,'csHotline2'); ?>
		<?php echo $form->error($model,'csHotline2'); ?></td>
</tr>
<tr>
<td class="label"></td>
		<td><?php echo $form->textField($model,'csHotline3'); ?>
		<?php echo $form->error($model,'csHotline3'); ?></td>
</tr>
<tr>
<td class="label"></td>
		<td><?php echo $form->textField($model,'csHotline4'); ?>
		<?php echo $form->error($model,'csHotline4'); ?></td>
</tr>
<tr>
<td class="label">销售热线：</td>
		<td><?php echo $form->textField($model,'sellHotline'); ?>
		<?php echo $form->error($model,'sellHotline'); ?></td>
</tr>
<tr>
<td class="label">咨询热线：</td>
		<td><?php echo $form->textField($model,'advisoryHotline'); ?>
		<?php echo $form->error($model,'advisoryHotline'); ?></td>
</tr>
<tr>
<td class="label">传真：</td>
		<td><?php echo $form->textField($model,'fax'); ?>
		<?php echo $form->error($model,'fax'); ?></td>
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
<td></td>
<td><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<br /><br />
<?php $this->endWidget(); ?>
</div><!-- form -->