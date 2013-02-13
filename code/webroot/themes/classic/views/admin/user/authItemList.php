<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'J_RoleList',
	'htmlOptions'=>array('data-get-role-api'=>Yii::app()->controller->createUrl('getAuthItem')),
    'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	'selectableRows'=>2,
    'columns'=>array(
		array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'name',
        	'checkBoxHtmlOptions'=>array('name'=>'name[]',),
        	'value'=>'$data->name',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'中文名称',
        	'value'=>'$data->zh_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'类别',
        	'value'=>'AuthItem::$TYPES[$data->type]',
        	
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CMUButtonColumn',
        	'template'=>'{update}{assign}{delete}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("name"=>$data->name))',
        	'deleteConfirmation'=>'是否确认删除该权限项！',
        	'buttons'=>array(
        		'assign'=>array(
        			'options'=>array('class'=>'ico-set','data-id'=>'$data->name','data-acttype'=>'$data->type-1'),
        		),
        		'delete'=>array(
        			'url'=>'Yii::app()->controller->createUrl("delete",array("name"=>$data->name))',
        		),
        		'update'=>array(
        			'click'=>'js:function(){
        				$.ajax({
        					url:this.href,
        					type:"POST",
        					beforeSend:function(){
        						$("#preview").addClass("srbacLoading");
        					},
        					success:function(html){$("#preview").html(html)},
        					complete:function(){
        						$("#preview").removeClass("srbacLoading");
        					}
        				});
        				return false;
        			}',
        		),
        	),
        	'updateButtonLabel'=>'修改'
        	)
    )
));
?>