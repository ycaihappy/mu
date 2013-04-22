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
		<td>
		<?php $this->widget('CCategoryLinkageWidget',array(
	'model'=>$model,
	'attribute'=>'sum_product_type',
	'form'=>$form,
	'ajaxRoute'=>'product/getChildrenTerm',
	'displayError'=>true,
));?></td>
</tr>
<tr>
<tr>
<td class="label">地区：</td>
		<td>
		<?php $this->widget('CCityLinkageWidget',array(
	'model'=>$model,
	'attribute'=>'sum_product_zone',
	'form'=>$form,
	'ajaxRoute'=>'product/getCity',
	'displayError'=>true,
));?>
</td>
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
		<input name="PriceSummary[sum_add_date]" readOnly type=text class='cmp-input' value="<?php echo $model->sum_add_date?$model->sum_add_date:date('Y-m-d H:i:s');?>"/>		
        <?php echo $form->error($model,'sum_add_date'); ?></td>
</tr>
<tr>
<td></td>
<td><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->