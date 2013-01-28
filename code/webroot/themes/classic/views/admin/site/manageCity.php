<div><?php echo CHtml::link('添加地区',Yii::app()->controller->createUrl("updateCity"))?></div>
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
        	'value'=>'$data->city_name',
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