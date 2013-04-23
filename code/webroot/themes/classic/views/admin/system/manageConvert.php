<?php
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	"外汇牌价",
);
?>
<?php 

$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'collectConvert',
				'caption'=>"开始采集外汇牌价",
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
		    $.ajax({
		    				url:"'.Yii::app()->controller->createUrl("collectConvert").'",
        					type:"POST",
        					beforeSend:function(){
        						$("#collectConvert").val("采集中.请等待...");
        					},
        					success:function(msg){
        						alert(msg);
								$.fn.yiiGridView.update("yw0");
        					},
        					complete:function(){
        						$("#collectConvert").val("重新采集外汇牌价");
        					}
        				});
			return false;
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
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="convertForm" action='' method='post'>
<?php 

	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
		array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'co_id',
        	'checkBoxHtmlOptions'=>array('name'=>'co_id[]',),
        	'value'=>'$data->co_id',
        ),
        array(
        	'name'=>'交易币种',
        	'value'=>'$data->co_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'交易单位',
        	'value'=>'$data->co_unit',
        ),
        array(
        	'name'=>'现价(人民币)',
        	'value'=>'$data->co_cur_price',
        ),
        array(
        	'name'=>'卖出价位',
        	'value'=>'$data->co_sell_price',
        ),
        array(
        	'name'=>'现汇买入价',
        	'value'=>'$data->co_cur_rate_buy_price',
        ),
        array(
        	'name'=>'现钞买入价',
        	'value'=>'$data->co_cur_cash_buy_price',
        ),
        array(
        	'name'=>'创建时间',
        	'value'=>'$data->co_added_time',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateConvert",array("co_id"=>$data->co_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'delete',
			'caption'=>'删除牌价信息',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要删除的牌价信息！");
			}
			else
			{
				if(confirm("确定删除选中的牌价信息"))
				{
					var url="'.Yii::app()->controller->createUrl('deleteConvert').'";
					$("#convertForm").ajaxSubmit(
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
