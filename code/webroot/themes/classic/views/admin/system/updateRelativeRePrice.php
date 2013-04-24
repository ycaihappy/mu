<?php 
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'钼相关稀土价格'=>array('manageRelativeRePrice'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">品名*：</td>
		<td>
	<?php
	$showNameType=in_array($model->re_type,RelativeRePrice::getProductType())?true:false;
	?>	
	<div id="name" style="display:<?php echo $showNameType?'none':'block'?>">
	<?php echo $form->textField($model,'re_name',array('class'=>'cmp-input')); ?>
	<?php echo $form->error($model,'re_name'); ?>
	</div>
	<div id="nameType" style="display:<?php echo $showNameType?'block':'none'?>">
	<?php echo $form->dropDownList($model,'re_name_type',$allNameTypies,array('class'=>'cmp-input')); ?>
	<?php echo $form->error($model,'re_name_type'); ?>
	<?php echo $form->error($model,'re_name'); ?>
	</div>
	<?php if($model->re_id): echo $form->hiddenField($model,'re_id');endif;?>
		</td>
</tr>
<tr>
<td class="label">资源类型：</td>
		<td><?php echo $form->dropDownList($model,'re_type',$allReTypes,array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td class="label">所属市场*：</td>
		<td><?php echo $form->textField($model,'re_market',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'re_market'); ?>
</tr>
<tr>
<td class="label">价格*：</td>
		<td><?php echo $form->textField($model,'re_price'); ?>元 - <?php echo $form->textField($model,'re_max_price'); ?>元
		<?php echo $form->error($model,'re_price'); ?></td>
</tr>
<tr>
<td class="label">涨跌幅度：</td>
		<td><?php echo $form->dropDownList($model,'re_fallup',$allFallUp); ?> <?php echo $form->numberField($model,'re_margin',array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'re_status',$allStatus,array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td class="label">时间：</td>
		<td><?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'model'=>$model,
				'attribute'=>'re_added_time',
			    'options'=>array(
			        'showAnim'=>'fold',
			    ),
			    'language'=>'zh',
			    'htmlOptions'=>array(
			    	'class'=>'cmp-input',
			    ),
			)
		);?>
		</td>
</tr>

<tr>
<td></td>
<td><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
$showTypies=json_encode(RelativeRePrice::getProductType());
$showHidden=<<<JSSCRIPT
$("#RelativeRePrice_re_type").change(function(){
	var showTypies={$showTypies};
	var value=parseInt($(this).val());
	if($.inArray(value,showTypies)>=0)
	{
		$("#name").css('display','none');
		$("#nameType").css('display','block');
	}
	else
	{
		$("#name").css('display','block');
		$("#nameType").css('display','none');
	}
});
JSSCRIPT;
Yii::app()->clientScript->registerScript('Relative#displayNameTypeOrNot',$showHidden);
?>
