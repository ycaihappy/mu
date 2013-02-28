<?php
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'邮件信息模板管理',
);
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addMessageTemplate',
				'caption'=>'添加信息模板',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl("saveMessageTemplate").'";
			}',
			)
	);
?>
<?php 

	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
    'columns'=>array(
        array(
        	'name'=>'模板标题',
        	'value'=>'$data->msg_template_name',
        ),  // display the 'name' attribute of the 'category' relation
        
        array(
        	'name'=>'模板助记符',
        	'value'=>'$data->msg_template_mnemonic',
        ),
        array(
        	'name'=>'模板类型',
        	'value'=>'$data->type->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'邮件模板主题',
        	'value'=>'$data->msg_template_title',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'创建时间',
        	'value'=>'$data->msg_template_added_date',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("saveMessageTemplate",array("msg_template_id"=>$data->msg_template_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>