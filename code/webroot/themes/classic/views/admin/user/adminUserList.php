<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'htmlOptions'=>array('data-get-role-api'=>Yii::app()->controller->createUrl('getAuthItem')),
	'id'=>'J_RoleList',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'user_id',
        	'checkBoxHtmlOptions'=>array('name'=>'user_id[]',),
        	'value'=>'$data->user_id',
        ),
        array(
        	'name'=>'用户名',
        	'value'=>'$data->user_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'角色',
        	'value'=>'$data->user_type',
        ),
        array(
        	'name'=>'姓名',
        	'value'=>'$data->user_first_name',
        ),   // display the 'content' attribute as purified HTML
        
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->user_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CMUButtonColumn',
        	'template'=>'{update}{assignRole}',
        	'buttons'=>array(
        		'assignRole'=>array(
        			'options'=>array('class'=>'ico-set','data-id'=>'$data->user_id','data-acttype'=>'2'),
        		),
       		 ),
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateAdminUser",array("user_id"=>$data->user_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>