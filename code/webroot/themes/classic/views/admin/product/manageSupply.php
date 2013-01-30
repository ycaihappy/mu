<?php
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$isSupply?'供应管理':'求购管理',
);
?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div style="float:right;">
<div>
<label>类型：</label>
<?php echo $form->dropDownList($model,'supply_category_id',$supplyCategory);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'supply_status',$supplyStatus);?>
<label>发布企业：</label>
<?php echo $form->textField($model,'supply_user_id',array('class'=>'cmp-input'));?>
<label>标题：</label>
<?php echo $form->textField($model,'supply_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'supply_id',
        	'checkBoxHtmlOptions'=>array('name'=>'supply_id[]',),
        	'value'=>'$data->supply_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->supply_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布公司',
        	'value'=>'$data->user->enterprise->ent_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'分类',
        	'value'=>'$data->category->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->supply_city_id',
        	'htmlOptions'=>array('align'=>'center'),
        ), 
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->supply_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateSupply",array("supply_id"=>$data->supply_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>