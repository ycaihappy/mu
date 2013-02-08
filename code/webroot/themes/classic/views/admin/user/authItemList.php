<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'authItems',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'',
    'columns'=>array(
        array(
        	'name'=>'名称',
        	'value'=>'$data->name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'类别',
        	'value'=>'AuthItem::$TYPES[$data->type]',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("update",array("name"=>$data->name))',
        	'buttons'=>array(
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
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>