<?php
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$isSpecial?'特价管理':'现货管理',
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
<?php echo $form->dropDownList($model,'product_type_id',$productType);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'product_status',$productStatus);?>
<label>发布企业：</label>
<?php echo $form->textField($model,'product_user_id',array('class'=>'cmp-input'));?>
<label>现货标题：</label>
<?php echo $form->textField($model,'product_name',array('class'=>'cmp-input'));?>
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
        	'id'=>'product_id',
        	'checkBoxHtmlOptions'=>array('name'=>'product_id[]',),
        	'value'=>'$data->product_id',
        ),
        array(
        	'name'=>'现货名称',
        	'value'=>'$data->product_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布公司',
        	'value'=>'$data->user->enterprise->ent_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'现货分类',
        	'value'=>'$data->type->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'数量',
        	'value'=>'$data->product_quanity." ".$data->unit->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ), 
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->product_city_id',
        	'htmlOptions'=>array('align'=>'center'),
        ), 
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->product_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateProduct",array("product_id"=>$data->product_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>