<?php 
$this->breadcrumbs=array(
	'广告/推荐模块管理'=>array('manageAdvertisement'),
	'广告管理'=>array('manageAdvertisement'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'advertisement-form',
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<?php if($model->ad_id): 
echo $form->hiddenField($model,'ad_id');
echo $form->hiddenField($model,'ad_user_id'); 
endif;?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">所属公司：</td>
		<td><input type=text disabled value="<?php echo $model->user?$model->user->enterprise->ent_name:'钼市网';?>" />
		
		<?php echo $form->error($model,'art_title'); ?></td>
</tr>
<tr>
<td class="label">标题：</td>
		<td><?php echo $form->textField($model,'ad_title',array('class'=>'cmp-input')); ?>
		
		<?php echo $form->error($model,'ad_title'); ?></td>
</tr>
<tr>
<td class="label">链接地址：</td>
		<td><?php echo $form->textField($model,'ad_link',array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'ad_link'); ?></td>
</tr>
<tr>
<td class="label">广告位置：</td>
		<td><?php echo $form->dropDownList($model,'ad_no',$adPosition); ?>
		<?php echo $form->error($model,'ad_no'); ?></td>
</tr>
<tr>
<td class="label">价格：</td>
		<td><?php echo $form->numberField($model,'ad_price'); ?>元
		<?php echo $form->error($model,'ad_price'); ?></td>
</tr>
<tr>
<td class="label">媒体类型：</td>
		<td><?php echo $form->dropDownList($model,'ad_type',$adType); ?>
		<?php echo $form->error($model,'ad_type'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'ad_status',$adStatus); ?>
		<?php echo $form->error($model,'ad_status'); ?></td>
</tr>
<tr>
<td class="label">点击数：</td>
		<td><?php echo $form->textField($model,'ad_click_num',array('class'=>'cmp-input','readOnly'=>'readOnly')); ?>	
		</td>
</tr>
<tr>
<td class="label">广告有效时间：</td>
		<td>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'name'=>'Advertisement[ad_start_date]',
			    'options'=>array(
			        'showAnim'=>'fold',
			    ),
			    'value'=>$model->ad_start_date,
			    'language'=>'zh',
			    'htmlOptions'=>array(
			    	'class'=>'cmp-input',
			    ),
			)
		);?>
<?php echo $form->error($model,'ad_start_date'); ?> - <?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'name'=>'Advertisement[ad_end_date]',
			    'options'=>array(
			        'showAnim'=>'fold',
			    ),
			    'value'=>$model->ad_end_date,
			    'language'=>'zh',
			    'htmlOptions'=>array(
			    	'class'=>'cmp-input',
			    ),
			)
		);?></td>
</tr>

<tr>
<td class="label">上传媒体：</td>
		<td>
		<?php echo CHtml::activeFileField($model,'ad_media_src'); ?>
		<div id="imgDiv">
			<?php if($model->ad_media_src) echo CHtml::image($model->ad_media_src,'',array('height'=>150))?>
        </div>
        <?php if(!$model->isNewRecord):?>
       	
        <?php echo CHtml::hiddenField('ad_media_src_hidden',$model->ad_media_src)?>
		
        <?php endif;?>
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
$("#Advertisement_ad_media_src").uploadPreview({ width: 200, height: 200, imgDiv: "#imgDiv", imgType: ["bmp", "gif", "png", "jpg"] });
PREVIEW;
Yii::app()->getClientScript()->registerScript('Advertisement#uploadPreview',$previewScript);
?>