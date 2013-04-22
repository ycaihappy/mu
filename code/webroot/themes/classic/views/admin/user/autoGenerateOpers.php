<?php 
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	'自动生成新功能',
);
?>
<?php echo SHtml::beginForm(); ?>
<?php
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'J_RoleList',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'',
	'selectableRows'=>2,
    'columns'=>array(
	    array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'name',
        	'checkBoxHtmlOptions'=>array('name'=>'name[]'),
        	'value'=>'$data["name"]',
        ),
        array(
        	'name'=>'所属模块',
        	'value'=>'$data["module"]',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'所属控制器',
        	'value'=>'$data["controller"]',
        ),
        array(
        	'name'=>'功能名',
        	'value'=>'$data["name"]',
        ),
    )
));
?>
<div>
<?php 
echo SHtml::ajaxSubmitButton(
    '保存所选功能',
    array('generateNewRightOpers') ,
    array(
    'type'=>'POST',
    'success'=>'function(html){
    	$.fn.yiiGridView.update("J_RoleList");
    }',
    ), array('name'=>'createOpers','class'=>'btn-a'));
    
?>
</div>
<?php echo SHtml::endForm(); ?>