<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	'会员组管理',
);

?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>

<div style="float:left;margin-bottom:15px;">
<?php 
	$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addUserGroup',
				'caption'=>'添加会员组',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl('updateUserGroup').'";
			}',
			)
	);

?>
</div>

<form id="userTempForm" action='<?php echo  Yii::app()->controller->createUrl('changeUserTemplateStatus') ?>' method='post'>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'userTemplate',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'group_id',
        	'checkBoxHtmlOptions'=>array('name'=>'group_id[]',),
        	'value'=>'$data->group_id',
        ),
        array(
        	'name'=>'图标',
        	'type'=>'html',
        	'value'=>'CHtml::image("/images/mushw/".$data->group_logo,$data->group_name,array("width"=>60))',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'分组名称',
        	'value'=>'$data->group_name',
        ),
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->group_added_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CMUButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateUserGroup",array("group_id"=>$data->group_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'启用分组',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#userTemplate .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要启用的分组信息！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeUserGroupStatus',array('toStatus'=>1)).'";
					$("#userTempForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("userTemplate");
							},
						}
					);
			}
			return false;
		}',
		)
);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button2',
			'caption'=>'禁用分组',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#userTemplate .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要禁用的分组信息！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeUserGroupStatus',array('toStatus'=>2)).'";
					$("#userTempForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("userTemplate");
							},
						}
					);
			}
			return false;
		}',
		)
);
?>
</DIV>
</form>
<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.form.js');
?>