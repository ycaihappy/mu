<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(  
    'id'=>'mydialog',//弹窗ID  
    // additional javascript options for the dialog plugin  
    'options'=>array(//传递给JUI插件的参数  
        'title'=>'弹窗标题',  
        'autoOpen'=>false,//是否自动打开  
        'width'=>'auto',//宽度  
        'height'=>'auto',//高度  
        'buttons'=>array(  
            '关闭'=>'js:function(){ $(this).dialog("close");}',//关闭按钮  
        ),  
  
    ),  
));  
  
    echo 'dialog content here';  
  
$this->endWidget('zii.widgets.jui.CJuiDialog');
$updateClick=<<<UPDATEAJAX
function()
{
	jQuery.ajax({
	url:$(this).attr('href'),
	type:'get',
	success:function(data){
		$("#mydialog").html(data);
	},
	});
	$("#mydialog").dialog("open"); 
	return false;
}
UPDATEAJAX;
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
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
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->term_create_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateTerm",array("term_id"=>$data->primaryKey))',
			'buttons'=>array(
        			'update'=>array(
        				'click'=>$updateClick,
        			),
        		),
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>