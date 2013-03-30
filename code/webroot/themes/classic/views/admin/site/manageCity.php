<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'地区管理',
);
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addCity',
			'caption'=>'添加地区',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    window.location.href="'.Yii::app()->controller->createUrl("updateCity").'";
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
<label>父级地区：</label>
<?php echo $form->dropDownList($model,'city_parent',$allCity);?>
<label>地区名称：</label>
<?php echo $form->textField($model,'city_name',array('class'=>'cmp-input'));?>
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
        	'id'=>'city_id',
        	'checkBoxHtmlOptions'=>array('name'=>'city_id[]',),
        	'value'=>'$data->city_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->city_name.($data->city_mu?"（钼相关）":"")',
        ),  // display the 'name' attribute of the 'category' relation
        
        array(
        	'name'=>'父级',
        	'value'=>'$data->city_parent',
        ),
        array(
        	'name'=>'是否显示',
        	'value'=>'$data->city_open?"显示":"隐藏"',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'排序号',
        	'value'=>'$data->city_order',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateCity",array("city_id"=>$data->city_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>