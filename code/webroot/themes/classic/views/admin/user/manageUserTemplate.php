<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	'旺铺模板管理',
);

?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>

<div style="float:left;">
<?php 
	$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addUserTemplate',
				'caption'=>'添加旺铺模板',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl('updateUserTemplate').'";
			}',
			)
	);

?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div style="float:right;">
<div>
<label>状态：</label>
<?php echo $form->dropDownList($model,'temp_status',$templateStatus,array('empty'=>'所有状态'));?>
<label>模板名称：</label>
<?php echo $form->textField($model,'temp_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
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
        	'id'=>'temp_id',
        	'checkBoxHtmlOptions'=>array('name'=>'temp_id[]',),
        	'value'=>'$data->temp_id',
        ),
        array(
        	'name'=>'缩略图',
        	'type'=>'html',
        	'value'=>'CHtml::image("/images/storeFront/".$data->temp_dir."/temp.jpg",$data->temp_name,array("width"=>97,"height"=>114))',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'模板名称',
        	'value'=>'$data->temp_name',
        ),
        array(
        	'name'=>'排序',
        	'value'=>'$data->temp_order',
        ),   // display the 'content' attribute as purified HTML
        
       array(
        	'name'=>'模板文件目录',
        	'value'=>'$data->temp_dir',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
       array(
        	'name'=>'模板状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->temp_added_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CMUButtonColumn',
        	'template'=>'{update}{delete}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateUserTemplate",array("temp_id"=>$data->temp_id))',
        	'updateButtonLabel'=>'修改',
        	'buttons'=>array(
        	'delete'=>array(
        		'click'=>'js:function(){
        		if(confirm("确定删除该模板？"))
        				$.ajax({
        					url:this.href,
        					type:"POST",
        					dataType:"json",
        					success:function(html){
        						alert(html.message);
        						if(html.status==1)
        						{
        							$.fn.yiiGridView.update("userTemplate");
        						}
        					},
        					
        				});
        				return false;
        			}',
        	),),
        	'deleteButtonUrl'=>'Yii::app()->controller->createUrl("deleteUserTemplate",array("temp_id"=>$data->temp_id))',
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
			'caption'=>'启用模板',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#userTemplate .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要启用的模板信息！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeUserTemplateStatus',array('toStatus'=>1)).'";
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
			'caption'=>'禁用模板',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#userTemplate .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要禁用的模板信息！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeUserTemplateStatus',array('toStatus'=>2)).'";
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