<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'基本类别管理',
);
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addTerm',
				'caption'=>'添加字典数据',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl("updateTerm").'";
			}',
			)
	);
$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'manageTermGroup',
				'caption'=>'管理字典分类',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl("manageTermGroup").'";
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
<label>所属分组：</label>
<?php echo $form->dropDownList($model,'term_group_id',$allGroups);?>
<label>名称：</label>
<?php echo $form->textField($model,'term_name',array('class'=>'cmp-input'));?>
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
        	'id'=>'term_id',
        	'checkBoxHtmlOptions'=>array('name'=>'term_id[]',),
        	'value'=>'$data->term_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->term_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'分类',
        	'value'=>'$data->termGroup->group_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'父级',
        	'value'=>'$data->term_parent_id',
        ),
        array(
        	'name'=>'排序',
        	'value'=>'$data->term_order',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->term_create_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateTerm",array("term_id"=>$data->term_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>