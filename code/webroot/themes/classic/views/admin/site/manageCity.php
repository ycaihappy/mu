<?php 

	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'city_id',
        	'checkBoxHtmlOptions'=>array('name'=>'city_id[]',),
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
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
