<?php 
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$model->product_special?'特价管理':'现货管理'=>array($model->product_special?'managespecial':'manageProduct'),
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
<table border="0" cellpadding="0" cellspacing="0" class="table-field">

<tr>
<td class="label">会员名：</td>
		<td>
			<input type=text disabled="disabled" class='cmp-input' value="<?php echo $model->user->user_name;?>"/>		
        <?php echo $form->hiddenField($model,'product_user_id');?>
        <?php echo $form->hiddenField($model,'product_special');?>
		<?php if($model->product_id): echo $form->hiddenField($model,'product_id');endif;?>
		</td>
</tr>

<tr>
<td class="label">企业名：</td>
		<td><input type=text disabled="disabled" class='cmp-input' value="<?php echo $model->user->enterprise->ent_name;?>"/></td>
</tr>
<tr>
<td class="label">品类：</td>
		<td><?php echo $form->dropDownList($model,'product_type_id',$productType); ?>
		<?php echo $form->error($model,'product_type_id'); ?></td>
</tr>
<tr>
<td class="label">品质：</td>
		<td><?php echo $form->dropDownList($model,'product_mu_content',$muContent); ?>
		<?php echo $form->error($model,'product_mu_content'); ?></td>
</tr>
<tr id="water_content_tr" style="display:<?php if(!$model->hasWaterContent()) echo 'none'?>">
<td class="label" >含水量：</td>
		<td><?php echo $form->dropDownList($model,'product_water_content',$waterContent); ?>
		<?php echo $form->error($model,'product_water_content'); ?></td>
</tr>
<tr>
<td class="label">名称：</td>
		<td><?php echo $form->textField($model,'product_name',array('class'=>'cmp-input')); ?>
		<?php if($model->product_id): echo $form->hiddenField($model,'product_id');endif;?>
		<?php echo $form->error($model,'product_name'); ?></td>
</tr>
<tr>
<td class="label">关键字：</td>
		<td><?php echo $form->textField($model,'product_keyword',array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'product_keyword'); ?></td>
</tr>
<tr>
<td class="label">单价：</td>
		<td><?php echo $form->textField($model,'product_price',array('class'=>'cmp-input')); ?>元/<?php echo $form->dropDownList($model,'product_unit',$unit); ?>
		<?php echo $form->error($model,'product_price'); ?></td>
</tr>
<tr>
<td class="label">地点：</td>
		<td><?php echo $form->dropDownList($model,'product_city_id',$allCity); ?>
		<?php echo $form->error($model,'product_city_id'); ?></td>
</tr>

<tr>
<td class="label">描述：</td>
		<td>
		<?php echo $form->textArea($model,'product_content',array('cols'=>50,'rows'=>8));?>
		<?php echo $form->error($model,'product_content'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'product_status',$productStatus); ?>
		<?php echo $form->error($model,'product_status'); ?></td>
</tr>
<tr>
<td class="label">审核人：</td>
		<td>
		<input name="Product[product_check_by'" type=text class='cmp-input' value="<?php echo $model->product_check_by?$model->product_check_by:Yii::app()->admin->getName();?>"/>		
        <?php echo $form->error($model,'product_check_by'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<br/>
<?php 
Yii::app()->clientScript->registerScript('Product#displayWaterConent','
$("#Product_product_type_id").change(function(){
	var category_id=$(this).val();
	var hasWater=category_id==31?"block":"none";
	$("#water_content_tr").css("display",hasWater);
});
');
?>