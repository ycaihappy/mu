<?php 
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	'企业库管理'=>array('manageEnterprise'),
	'添加/修改',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'enterprise-form',
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

		<?php if($model->ent_id): echo $form->hiddenField($model,'ent_id');endif;?>
		</td>
</tr>


<td class="label">企业名称：</td>
		<td><?php echo $form->textField($model,'ent_name',array('class'=>'cmp-input')); ?>
		<?php echo $form->error($model,'ent_name'); ?></td>
</tr>
<tr>
<td class="label">企业类型：</td>
		<td><?php echo $form->dropDownList($model,'ent_type',$type); ?>
		<?php echo $form->error($model,'ent_type'); ?></td>
</tr>
<tr>
<td class="label">经营方式：</td>
		<td><?php echo $form->dropDownList($model,'ent_business_model',$businessModel); ?>
		<?php echo $form->error($model,'ent_business_model'); ?></td>
</tr>
<tr>
<td class="label">经营范围：</td>
		<td><?php echo $form->textField($model,'ent_business_scope'); ?>
		<?php echo $form->error($model,'ent_business_scope'); ?></td>
</tr>
<tr>
<td class="label">地点：</td>
		<td><?php echo CHtml::dropDownList('province',$province,$allProvince,array(
			'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#Enterprise_ent_city',
                    'data'=>array('province_id'=>"js:this.value")
				),
		)); ?> <?php echo $form->dropDownList($model,'ent_city',$allCity,array('empty'=>'选择城市')); ?>
		<?php echo $form->error($model,'ent_city'); ?></td>
</tr>
<tr>
<td class="label">地址：</td>
		<td><?php echo $form->textField($model,'ent_location'); ?>
		<?php echo $form->error($model,'ent_location'); ?></td>
</tr>
<tr>
<td class="label">公司介绍：</td>
		<td>
		<?php 
		/*$this->widget('application.extensions.ckeditor.CKEditor',array( 
				    
		"model"=>$model,

		"attribute"=>'ent_introduce',

		"height"=>'400px',
				    
		"width"=>'600px',       
				    
		'editorTemplate'=>'advanced',
		
		) 
);*/
		$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'ent_introduce',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 400px;'),
				));

?>
<?php echo $form->error($model,'ent_introduce'); ?>
		</td>
</tr>
<tr>
<td class="label">法人代表：</td>
		<td><?php echo $form->textField($model,'ent_chief'); ?><?php echo $form->dropDownList($model,'ent_chief_postion',$pos); ?>
		<?php echo $form->error($model,'ent_chief'); ?></td>
</tr>
<tr>
<td class="label">注册资本：</td>
		<td><?php echo $form->textField($model,'ent_registered_capital'); ?>万元
		<?php echo $form->error($model,'ent_registered_capital'); ?></td>
</tr>
<tr>
<td class="label">网址：</td>
		<td><?php echo $form->textField($model,'ent_website'); ?>
		<?php echo $form->error($model,'ent_website'); ?></td>
</tr>
<tr>
<td class="label">邮编：</td>
		<td><?php echo $form->textField($model,'ent_zipcode'); ?>
		<?php echo $form->error($model,'ent_zipcode'); ?></td>
</tr>
<tr>
<td class="label">状态：</td>
		<td><?php echo $form->dropDownList($model,'ent_status',$entStatus); ?>
		<?php echo $form->error($model,'ent_status'); ?></td>
</tr>
<tr>
<td class="label">审核人：</td>
		<td>
		<input name="Product[ent_check_by]" type=text class='cmp-input' value="<?php echo $model->ent_check_by?$model->ent_check_by:Yii::app()->admin->getName();?>"/>		
        <?php echo $form->error($model,'ent_check_by'); ?></td>
</tr>
<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存',array('class'=>'btn-a')); ?></td>
</tr>
</table>
<br/>
<?php $this->endWidget(); ?>
</div><!-- form -->