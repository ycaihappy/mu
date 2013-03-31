<?php 
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'文章管理'=>array('manageNews'),
	$curCategory.'管理'=>array('manageNews'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php echo $form->hiddenField($model,'art_category_id');?>
<?php if($model->art_id): 
echo $form->hiddenField($model,'art_id');
endif;?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">文章分类：</td>
		<td><?php echo $form->dropDownList($model,'art_subcategory_id',$artSubCategory); ?>
		<?php echo $form->error($model,'art_subcategory_id'); ?></td>
</tr>

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
<td class="label">简介：</td>
		<td><?php echo $form->textArea($model,'art_summary',array('style'=>'width:352px;height:71px')); ?>	
		<?php echo $form->error($model,'art_summary'); ?></td>
</tr>
<tr>
<td class="label">内容：</td>
		<td>
		
		<?php 
		$this->widget('application.extensions.ckeditor.CKEditor',array( 
				    
		"model"=>$model,

		"attribute"=>'art_content',

		"height"=>'400px',
				    
		"width"=>'400px',       
				    
		'editorTemplate'=>'full',
		
		) 
);
		/*$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'art_content',
				    'htmlOptions'=>array('class'=>'xheditor-min','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 400px;'),
				));*/

?>
		<?php echo $form->error($model,'art_content'); ?></td>
</tr>
<tr>
<td class="label">阅览数：</td>
		<td>
		<input name="art_click_count" disabled type=text class='cmp-input' value="<?php echo $model->art_click_count?>"/>		
        <input name='Article[art_click_count]' type=hidden value="<?php echo $model->art_click_count?>""/>
		</td>
</tr>
<tr>
<td class="label">文章图片：</td>
		<td>
		<?php echo CHtml::activeFileField($model,'art_img'); ?>
		<div id="imgDiv">
			<?php if($model->art_img) echo CHtml::image('images/article/'.$model->art_img,'',array('width'=>400,'height'=>280))?>
        </div>
        <?php if(!$model->isNewRecord):?>
        <?php echo CHtml::hiddenField('art_img_2',$model->art_img)?>
        <?php endif;?>
		</td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'art_status',$artStatus); ?>
		<?php echo $form->error($model,'art_status'); ?></td>
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
       </td>
</tr>
<tr>
<td class="label">审核人：</td>
		<td>
		<input name="Article[art_check_by]" type=text class='cmp-input' value="<?php echo $model->art_check_by?$model->art_check_by:Yii::app()->admin->getName();?>"/>		
        <?php echo $form->error($model,'art_check_by'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>

</tr>
</table>
<br>
<br>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
Yii::app()->getClientScript()->registerScriptFile('/js/jquery.uploadPreview.js');
$previewScript=<<<PREVIEW
$("#Article_art_img").uploadPreview({ width:400, height: 280, imgDiv: "#imgDiv", imgType: ["gif", "png", "jpg"] });
PREVIEW;
Yii::app()->getClientScript()->registerScript('Article#uploadPreview',$previewScript);
?>