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
<?php if($model->co_id): echo $form->hiddenField($model,'co_id');endif;?>
<tr>
<td class="label">交易币种：</td>
		<td><?php echo $form->textField($model,'co_name',array('class'=>'cmp-input')); ?>
		</td>
</tr>
<tr>
<td class="label">交易单位：</td>
		<td><?php echo $form->textField($model,'co_unit',array('class'=>'cmp-input')); ?>
</tr>
<tr>
<td class="label">现价(人民币)：</td>
		<td><?php echo $form->textField($model,'co_cur_price'); ?>
		<?php echo $form->error($model,'co_cur_price'); ?></td>
</tr>
<tr>
<td class="label">卖出价位：</td>
		<td><?php echo $form->textField($model,'co_sell_price'); ?>
		</td>
</tr>
<tr>
<td class="label">现汇买入价：</td>
		<td><?php echo $form->textField($model,'co_cur_rate_buy_price'); ?>
		</td>
</tr>
<tr>
<td class="label">现钞买入价：</td>
		<td><?php echo $form->textField($model,'co_cur_cash_buy_price'); ?>
		</td>
</tr>
<tr>
<td class="label">采集时间：</td>
		<td><?php echo $form->textField($model,'co_added_time',array('readOnly'=>'readOnly')); ?>
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
