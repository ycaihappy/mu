<?php
$userId=@$_REQUEST['Product']['product_user_id']?@$_REQUEST['Product']['product_user_id']:0;
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	$isSpecial?'特价管理':'现货管理',
);
$productChangeStatusAction=$isSpecial?'changeSpecialStatus':'changeProductStatus';
$queryFormAction=$isSpecial?'manageSpecial':'manageProduct';
?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>
<div >
<?php 
if($userId)
{
	$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'add',
				'caption'=>'添加现货',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl('updateProduct',array('user_id'=>$userId)).'";
			}',
			)
	);
}
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'fullImportProductSolr',
			'caption'=>'全索引更新',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		if(confirm("确认更新索引")){
		    $.ajax(
				{
					url:"'.Yii::app()->controller->createUrl("product/fullImportProductSolr").'",
        			type:"get",
        			beforeSend:function(){
        						$("#collectConvert").val("更新中.请等待...");
        					},
        			success:function(msg){
        				alert(msg);
        				$.fn.yiiGridView.update("yw0");
        			},
        			error:function(){
        				alert("请求发送失败!");
        			},
        			complete:function(){
        						$("#collectConvert").val("重新全索引更新");
        					}
				}
				);}
		}',
		)
);
?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'deltaImportProductSolr',
			'caption'=>'增量索引更新',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		
		if(confirm("确认更新索引")){
		    $.ajax(
				{
					url:"'.Yii::app()->controller->createUrl("product/deltaImportProductSolr").'",
        			type:"get",
        			beforeSend:function(){
        						$("#collectConvert").val("更新中.请等待...");
        					},
        			success:function(msg){
        				alert(msg);
        				$.fn.yiiGridView.update("yw0");
        			},
        			error:function(){
        				alert("请求发送失败!");
        			},
        			complete:function(){
        						$("#collectConvert").val("重新增量更新");
        					}
				}
				);}
		}',
		)
);
?>
</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'action'=>$this->createUrl($queryFormAction),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 
?>
<div style="float:right;">
<div>
<label>类型：</label>
<?php $this->widget('CCategoryLinkageWidget',array(
	'parentCategory'=>$parentCategory,
	'model'=>$model,
	'attribute'=>'product_type_id',
	'form'=>$form,
	'ajaxRoute'=>'product/getChildrenTerm'
));
if($userId)echo $form->hiddenField($model,'product_user_id');
?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'product_status',$productStatus);?>
<?php if(!$userId):?>
<label>发布企业：</label>
<?php echo $form->textField($model,'product_keyword',array('class'=>'cmp-input'));?>
<?php endif;?>
<label>现货标题：</label>
<?php echo $form->textField($model,'product_name',array('class'=>'cmp-input'));?>&nbsp;
<?php echo CHtml::submitButton('搜索',array('class'=>'btn-a')); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="productForm" action='<?php echo  Yii::app()->controller->createUrl($productChangeStatusAction) ?>' method='post'>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'product_id',
        	'checkBoxHtmlOptions'=>array('name'=>'product_id[]',),
        	'value'=>'$data->product_id',
        ),
        array(
        	'name'=>'现货名称',
        	'value'=>'$data->product_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布公司',
        	'value'=>'$data->user->enterprise?$data->user->enterprise->ent_name:"未指定"',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'现货分类',
        	'value'=>'$data->type?$data->type->term_name:"未指定"',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'数量',
        	'value'=>'$data->product_quanity." ".$data->unit->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ), 
       array(
        	'name'=>'状态',
        	'value'=>'$data->status?$data->status->term_name:"未指定"',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->product_city_id',
        	'htmlOptions'=>array('align'=>'center'),
        ), 
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->product_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateProduct",array("product_id"=>$data->product_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle=$isSpecial?'特价':'现货';
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
					var url="'.Yii::app()->controller->createUrl($productChangeStatusAction,array('toStatus'=>1)).'";
					$("#productForm").ajaxSubmit(
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
					var url="'.Yii::app()->controller->createUrl($productChangeStatusAction,array('toStatus'=>2)).'";
					$("#productForm").ajaxSubmit(
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
		'name'=>'button3',
			'caption'=>'删除',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要删除的'.$alertTitle.'信息！");
			}
			else
			{
				if(confirm("确定删除选中的'.$alertTitle.'信息"))
				{
					var url="'.Yii::app()->controller->createUrl('deleteProduct').'";
					$("#productForm").ajaxSubmit(
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
        			data:{info_ids:ids,info_type:22,info_pos:info_pos},
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