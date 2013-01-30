<?php 
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	$isNews?'新闻管理':'行情管理'=>array($isNews?'manageNews':'managePrice'),
	'添加/修改',
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
<?php echo $form->hiddenField($model,'art_category_id');?>
<?php if($model->art_id): echo $form->hiddenField($model,'art_id');endif;?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">标题：</td>
		<td><?php echo $form->textField($model,'art_title',array('class'=>'cmp-input')); ?>
		
		<?php echo $form->error($model,'art_title'); ?></td>
</tr>
<tr>
<td class="label">关键字：</td>
		<td><?php echo $form->textField($model,'art_tags',array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'art_tags'); ?></td>
</tr>
<tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'art_status',$artStatus); ?>
		<?php echo $form->error($model,'art_status'); ?></td>
</tr>
<tr>
<tr>
<td class="label">内容：</td>
		<td>
		<?php echo $form->textArea($model,'art_content',array('cols'=>50,'rows'=>8));?>
		<?php echo $form->error($model,'art_content'); ?></td>
</tr>
<tr>
<td class="label">发布人：</td>
		<td>
		<input name="art_user_id" disabled type=text class='cmp-input' value="<?php echo $model->art_user_id?$model->createUser->user_name:Yii::app()->admin->getName();?>"/>		
        <input name='Article[art_user_id]' type=hidden value="<?php echo $model->art_user_id?$model->art_user_id:Yii::app()->admin->getId();?>"/>
		</td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<input name="Article[art_post_date]" disabled type=text class='cmp-input' value="<?php echo $model->art_post_date?$model->art_post_date:date('Y-m-d H:i:s');?>"/>		
        <?php echo $form->error($model,'art_post_date'); ?></td>
</tr>
<tr>
<td class="label">审核人：</td>
		<td>
		<input name="Article[art_check_by]" type=text class='cmp-input' value="<?php echo $model->art_check_by?$model->art_check_by:Yii::app()->admin->getName();?>"/>		
        <?php echo $form->error($model,'art_check_by'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->