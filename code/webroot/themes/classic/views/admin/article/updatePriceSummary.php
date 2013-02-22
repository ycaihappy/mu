<?php 
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'行情走势数据'=>array('managePriceSummary'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'priceSummary-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<?php if($model->sum_id): echo $form->hiddenField($model,'sum_id');endif;?>


<table border="0" cellpadding="0" cellspacing="0" class="table-field">
<tr>
<td class="label">年-月-日：</td>
		<td><?php echo $form->numberField($model,'sum_year'); ?> - <?php echo $form->numberField($model,'sum_month'); ?> - <?php echo $form->numberField($model,'sum_day'); ?>
		
		<?php echo $form->error($model,'sum_year'); ?><?php echo $form->error($model,'sum_month'); ?><?php echo $form->error($model,'sum_day'); ?></td>
</tr>
<tr>
<td class="label">品类：</td>
		<td><?php echo $form->dropDownList($model,'sum_product_type',$allCategory,array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'sum_product_type'); ?></td>
</tr>
<tr>
<tr>
<td class="label">地区：</td>
		<td><?php echo $form->dropDownList($model,'sum_product_zone',$allCity,array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'art_status'); ?></td>
</tr>
<tr>
<tr>
<td class="label">价格：</td>
		<td>
		<?php echo $form->numberField($model,'sum_price',array('class'=>'cmp-input'));?>/<?php echo $form->dropDownList($model,'sum_unit',$unit,array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'sum_price'); ?><?php echo $form->error($model,'sum_unit'); ?></td>
</tr>
<tr>
<td class="label">创建时间：</td>
		<td>
		<input name="PriceSummary[sum_added_time]" readOnly type=text class='cmp-input' value="<?php echo $model->sum_added_time?$model->sum_added_time:date('Y-m-d H:i:s');?>"/>		
        <?php echo $form->error($model,'sum_added_time'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->