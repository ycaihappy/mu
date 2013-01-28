
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		名称：
		<?php echo $form->textField($model,'city_name'); ?>
		<?php if($model->city_id): echo $form->hiddenField($model,'city_id');endif;?>
		<?php echo $form->error($model,'city_name'); ?>
	</div>

	<div class="row">
		父级：
		<?php echo $form->dropDownList($model,'city_parent',$allCity); ?>
		<?php echo $form->error($model,'city_parent'); ?>
	</div>
	<div class="row">
		是否显示：
		<?php echo $form->checkBox($model,'city_open',array('value'=>1)); ?>
		<?php echo $form->error($model,'city_open'); ?>
	</div>
	<div class="row">
		排序：
		<?php echo $form->textField($model,'city_order'); ?>
		<?php echo $form->error($model,'city_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('保存'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->