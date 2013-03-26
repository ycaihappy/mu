<?php
$this->breadcrumbs=array(
	'广告/推荐管理'=>array('manageAdvertisement'),
	'推荐管理',
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
<label>推荐模块：</label>
<?php echo $form->dropDownList($model,'recommend_position',$rePosition);?>
<label>推荐信息类型：</label>
<?php echo $form->dropDownList($model,'recommend_type',$reType);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'recommend_status',$reStatus);?>
<label>信息标题：</label>
<?php echo $form->textField($model,'recommend_id',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="recommendForm" action='' method='post'>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'recommend_id',
        	'checkBoxHtmlOptions'=>array('name'=>'recommend_id[]',),
        	'value'=>'$data->recommend_id',
        ),
        array(
        	'name'=>'推荐信息标题',
        	'value'=>'$data->name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'所属模块',
        	'value'=>'$data->module->term_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'信息类型',
        	'value'=>'$data->infoType->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
     
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
      
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->recommend_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateRecommend",array("recommend_id"=>$data->recommend_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<div>
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
				alert("请选择要删除的推荐信息！");
			}
			else
			{
				if(confirm("确定删除选中的推荐信息"))
				{
					var url="'.$this->createUrl('deleteRecommend').'";
					$("#recommendForm").ajaxSubmit(
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
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.form.js');
?>
</div>
</form>
<br/>
<br/>
<br/>