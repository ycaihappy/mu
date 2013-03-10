<?php
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'行情走势数据',
);

?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addPriceSummary',
			'caption'=>'录入行情数据',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    window.location.href="'.Yii::app()->controller->createUrl("updatePriceSummary").'";
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
<label>年：</label>
<?php echo $form->numberField($model,'sum_year');?>
<label>月：</label>
<?php echo $form->numberField($model,'sum_month',array('class'=>'cmp-input'));?>
<label>日：</label>
<?php echo $form->numberField($model,'sum_day',array('class'=>'cmp-input'));?>
<label>品类：</label>
<?php echo $form->dropDownList($model,'sum_product_type',$allCategory,array('class'=>'cmp-input','empty'=>'不限品类'));?>
<label>地区：</label>
<?php echo $form->dropDownList($model,'sum_product_zone',$allCity,array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form action='<?php echo Yii::app()->controller->createUrl("deletePriceSummary") ?>' method='post'>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'sum_id',
        	'checkBoxHtmlOptions'=>array('name'=>'sum_id[]',),
        	'value'=>'$data->sum_id',
        ),
        array(
        	'name'=>'时间',
        	'value'=>'$data->sum_year."-".$data->sum_month."-".$data->sum_day',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'品类',
        	'value'=>'$data->sum_product_type',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'单价',
        	'value'=>'$data->sum_price."/".$data->unit->term_name ',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->sum_product_zone',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->sum_add_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updatePriceSummary",array("sum_id"=>$data->sum_id))',
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
		'name'=>'button3',
			'caption'=>'删除',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要删除的行情信息！");
			}
			else
			{
				if(confirm("确定删除选中的行情信息"))
				{
					var url="'.Yii::app()->controller->createUrl('deletePriceSummary',array('toStatus'=>33)).'";
					$("#imageLibForm").ajaxSubmit(
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