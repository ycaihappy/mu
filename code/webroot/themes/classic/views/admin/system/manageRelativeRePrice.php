<?php
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'钼相关稀土价格',
);
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addRelativeRePrice',
				'caption'=>'添加相关稀土价格',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl("updateRelativeRePrice").'";
			}',
			)
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
<label>状态：</label>
<?php echo $form->dropDownList($model,'re_status',$allReStatus);?>
<label>品名：</label>
<?php echo $form->textField($model,'re_name',array('class'=>'cmp-input'));?>
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
        	'id'=>'re_id',
        	'checkBoxHtmlOptions'=>array('name'=>'re_id[]',),
        	'value'=>'$data->re_id',
        ),
        array(
        	'name'=>'稀土品名',
        	'value'=>'$data->re_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'价格',
        	'value'=>'$data->re_price',
        ),
        array(
        	'name'=>'涨，跌',
        	'value'=>'($data->fallup?$data->fallup->term_name:"-")." ".$data->re_margin',
        ),
        array(
        	'name'=>'所属市场',
        	'value'=>'$data->re_market',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'创建时间',
        	'value'=>'$data->re_added_time',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateRelativeRePrice",array("re_id"=>$data->re_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>