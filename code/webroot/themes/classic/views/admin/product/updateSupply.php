<?php 
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$model->supply_type==18?'供应管理':'求购管理'=>array('manageSupply'),
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
        <?php echo $form->hiddenField($model,'supply_user_id');?>
        <?php echo $form->hiddenField($model,'supply_type');?>
		<?php if($model->supply_id): echo $form->hiddenField($model,'supply_id');endif;?>
		</td>
</tr>

<tr>
<td class="label">企业名：</td>
		<td><input type=text disabled="disabled" class='cmp-input' value="<?php echo $model->user->enterprise->ent_name;?>"/></td>
</tr>
<tr>
<td class="label">品类：</td>
		<td><?php

		echo CHtml::dropDownList('parentCategory',$parentCategory,$supplyParentCategory,array(
		 'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getChildrenTerm'),
                    'update'=>'#Supply_supply_category_id',
                    'data'=>array('parent_id'=>"js:this.value",'group_id'=>14)
				),
		)); ?>
		<?php echo $form->dropDownList($model,'supply_category_id',$supplyCategory,array('empty'=>'选择品类')); ?>
		<?php echo $form->error($model,'supply_category_id'); ?></td>
</tr>
<tr>
<td class="label">名称：</td>
		<td><?php echo $form->textField($model,'supply_name',array('class'=>'cmp-input')); ?>
		<?php if($model->supply_id): echo $form->hiddenField($model,'supply_id');endif;?>
		<?php echo $form->error($model,'supply_name'); ?></td>
</tr>
<tr>
<td class="label">关键字：</td>
		<td><?php echo $form->textField($model,'supply_keyword',array('class'=>'cmp-input')); ?>	
		<?php echo $form->error($model,'supply_keyword'); ?></td>
</tr>

<tr>
<td class="label">品质：</td>
		<td><?php echo $form->textField($model,'supply_mu_content'); ?></td>
</tr>
<tr id="water_content_tr" style="display:<?php if(!$model->hasWaterContent()) echo 'none'?>">
<td class="label" >含水量：</td>
		<td><?php echo $form->textField($model,'supply_water_content'); ?></td>
</tr>

<tr>
<td class="label">单价：</td>
		<td><?php echo $form->textField($model,'supply_price',array('class'=>'cmp-input')); ?>元/<?php echo $form->dropDownList($model,'supply_unit',$unit); ?>
		<?php echo $form->error($model,'supply_price'); ?></td>
</tr>
<tr>
<td class="label">地区：</td>
		<td><?php echo CHtml::dropDownList('province',$province,$allProvince,array(
			'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#Supply_supply_city_id',
                    'data'=>array('province_id'=>"js:this.value")
				),
		)); ?> 
		
		<?php echo $form->dropDownList($model,'supply_city_id',$allCity,array('emtpy'=>'请选择城市')); ?>
		<?php echo $form->error($model,'supply_city_id'); ?></td>
</tr>
<tr>
<td class="label">地址：</td>
		<td><?php echo $form->textField($model,'supply_address'); ?>
		<?php echo $form->error($model,'supply_address'); ?></td>
</tr>
<tr>
<td class="label">电话：</td>
		<td><?php echo $form->textField($model,'supply_phone'); ?>
		<?php echo $form->error($model,'supply_phone'); ?></td>
</tr>

<tr>
<td class="label">描述：</td>
		<td>
		<?php $this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'supply_content',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 400px;'),
				));?>
		<?php echo $form->error($model,'supply_content'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'supply_status',$supplyStatus); ?>
		<?php echo $form->error($model,'supply_status'); ?></td>
</tr>
<tr>
		<td class="label">信息附图：</td><td><img src="<?php echo $model->supply_image_src?'/images/commonProductsImages/thumb/thumb_'.$model->supply_image_src:'/images/thumb.gif'?>" class="thumb" id="image_thumb">
			<input type="hidden" name="Supply[supply_image_src]" value="<?php echo $model->supply_image_src?>" id="image_src"/></td>
</tr>
<tr>
<td class="label">审核人：</td>
		<td>
		<input name="Supply[supply_check_by]" type=text class='cmp-input' value="<?php echo $model->supply_check_by?$model->supply_check_by:Yii::app()->admin->getName();?>"/>		
        <?php echo $form->error($model,'supply_check_by'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<?php $this->endWidget(); ?>
</div><!-- form -->
<br/>
<?php 
Yii::app()->clientScript->registerScript('Product#displayWaterConent','
$("#Supply_supply_category_id").change(function(){
	var category_id=$(this).val();
	var hasWater=category_id==31?"block":"none";
	$("#water_content_tr").css("display",hasWater);
});
');
?>