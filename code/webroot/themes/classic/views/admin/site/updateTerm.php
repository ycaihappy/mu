
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'term-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		名称：
		<?php echo $form->textField($model,'term_name'); ?>
		<?php echo $form->error($model,'term_name'); ?>
	</div>

	<div class="row">
		类型：
		<?php echo $form->dropDownList($model,'term_group_id',$termGroup,array(
        'empty'=>'分组类型',
        'ajax'=>array(
                    'type'=>'GET',
                    'url'=>CController::createUrl('site/updateTerm'),
                    'update'=>'#Term_term_parent_id',
                    'data'=>array('group_id'=>"js:this.value",'type'=>'getTermByGroupId')
                ))); ?>
		<?php echo $form->error($model,'term_group_id'); ?>
	</div>
	<div class="row">
		父级：
		<?php echo $form->dropDownList($model,'term_parent_id',$terms); ?>
		<?php echo $form->error($model,'term_parent_id'); ?>
	</div>
	<div class="row">
		slug：
		<?php echo $form->textField($model,'term_slug'); ?>
		<?php echo $form->error($model,'term_slug'); ?>
	</div>
	<div class="row">
		排序：
		<?php echo $form->textField($model,'term_order'); ?>
		<?php echo $form->error($model,'term_order'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('保存'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->