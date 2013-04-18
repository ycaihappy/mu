<?php
$re_type=@$_REQUEST['RelativeRePrice']['re_type']?@$_REQUEST['RelativeRePrice']['re_type']:134;
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	"{$allReTypes[$re_type]}价格",
);
?>
<?php 

$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'addRelativeRePrice',
				'caption'=>"添加{$allReTypes[$re_type]}价格",
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl("updateRelativeRePrice",array('RelativeRePrice[re_type]'=>$re_type)).'";
			}',
			)
	);
?>
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
<?php echo $form->dropDownList($model,'re_type',$allReTypes);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'re_status',$allReStatus);?>
<label>品名：</label>
<?php echo $form->textField($model,'re_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="relativRePriceForm" action='' method='post'>
<?php 

	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
		array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'re_id',
        	'checkBoxHtmlOptions'=>array('name'=>'re_id[]',),
        	'value'=>'$data->re_id',
        ),
        array(
        	'name'=>'稀土品名',
        	'value'=>'in_array($data->re_type,array(148,149))?($data->nameType?$data->nameType->term_name:"未指定"):$data->re_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'最低价',
        	'value'=>'$data->re_price',
        ),
        array(
        	'name'=>'最高价',
        	'value'=>'$data->re_max_price',
        ),
        array(
        	'name'=>'涨，跌',
        	'value'=>'($data->fallup?$data->fallup->term_name:"-")." ".$data->re_margin',
        ),
        array(
        	'name'=>'所属市场',
        	'value'=>'$data->re_market',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'资源类型',
        	'value'=>'$data->type?$data->type->term_name:"未指定"',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'创建时间',
        	'value'=>'$data->re_added_time',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateRelativeRePrice",array("re_id"=>$data->re_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'delete',
			'caption'=>'删除价格信息',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要删除的价格信息！");
			}
			else
			{
				if(confirm("确定删除选中的价格信息"))
				{
					var url="'.Yii::app()->controller->createUrl('deleteRelativeRePrice').'";
					$("#relativRePriceForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("yw0");
							},
						}
					);
				}
			}
			return false;
		}',)
);
?>
</form>
<br/>
<br/>
<br/>
<br/>
<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.form.js');
?>
