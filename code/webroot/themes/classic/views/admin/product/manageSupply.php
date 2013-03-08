<?php
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$isSupply?'供应管理':'求购管理',
);
$supplyChangeStatusAction=$isSupply?'changeSupplyStatus':'changeBuyStatus';
?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div style="float:right;">
<div>
<label>类型：</label>
<?php echo $form->dropDownList($model,'supply_category_id',$supplyCategory);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'supply_status',$supplyStatus);?>
<label>发布企业：</label>
<?php echo $form->textField($model,'supply_user_id',array('class'=>'cmp-input'));?>
<label>标题：</label>
<?php echo $form->textField($model,'supply_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="supplyForm" action='<?php echo  Yii::app()->controller->createUrl($supplyChangeStatusAction) ?>' method='post'>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'supply_id',
        	'checkBoxHtmlOptions'=>array('name'=>'supply_id[]',),
        	'value'=>'$data->supply_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->supply_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布公司',
        	'value'=>'$data->user->enterprise?$data->user->enterprise->ent_name:"未指定"',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'分类',
        	'value'=>'$data->category?$data->category->term_name:"未指定"',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->supply_city_id',
        	'htmlOptions'=>array('align'=>'center'),
        ), 
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->supply_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateSupply",array("supply_id"=>$data->supply_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle=$isSupply?'供应':'求购';
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'审核为有效',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要生效的'.$alertTitle.'信息！");
			}
			else
			{
					var url=this.form.action+"&toStatus=1";
					$("#supplyForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("yw0");
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
			'caption'=>'审核为无效',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要设为无效的'.$alertTitle.'信息！");
			}
			else
			{
					var url=this.form.action+"&toStatus=2";
					$("#supplyForm").ajaxSubmit(
						{
							url:url,
							success:function(msg){
								alert(msg);
								$.fn.yiiGridView.update("yw0");
							},
						}
					);
			}
			return false;
		}',
		)
);
echo '   '.CHtml::dropDownList('info_pos', 0, $rePosition);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button4',
			'caption'=>'确定推荐',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要推荐的'.$alertTitle.'信息！");
			}
			else
			{
				var ids=[],info_pos=$("#info_pos").val();
				for(var i=0;i<selectedProducts.size();i++)
				{
					ids.push(selectedProducts[i].value);
				}
				
				$.ajax(
				{
					url:"'.Yii::app()->controller->createUrl("advertisementRecommend/recommendInfo").'",
        			type:"POST",
        			data:{info_ids:ids,info_type:21,info_pos:info_pos},
        			success:function(msg){
        				alert(msg);
        			},
        			error:function(){
        				alert("请求发送失败!");
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