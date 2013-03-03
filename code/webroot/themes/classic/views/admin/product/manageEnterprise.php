<?php
$this->breadcrumbs=array(
	'信息管理'=>array('manageProduct'),
	'企业库管理',
);
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
<label>企业类型：</label>
<?php echo $form->dropDownList($model,'ent_type',$type);?>
<label>经营模式：</label>
<?php echo $form->dropDownList($model,'ent_business_model',$businessModel);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'ent_status',$entStatus);?>
<label>企业名称：</label>
<?php echo $form->textField($model,'ent_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form action='<?php echo  Yii::app()->controller->createUrl('changeEnterpriseStatus') ?>' method='post'>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'ent_id',
        	'checkBoxHtmlOptions'=>array('name'=>'ent_id[]',),
        	'value'=>'$data->ent_id',
        ),
        array(
        	'name'=>'公司名称',
        	'value'=>'$data->ent_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'用户名',
        	'value'=>'$data->user->user_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'公司类型',
        	'value'=>'$data->type->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'经营模式',
        	'value'=>'$data->business->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ), 
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'地区',
        	'value'=>'$data->ent_city',
        	'htmlOptions'=>array('align'=>'center'),
        ), 
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->ent_create_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateEnterprise",array("ent_id"=>$data->ent_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle='企业';
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
				this.form.action+="&toStatus=1";
				this.form.submit();
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
				this.form.action+="&toStatus=2";
				this.form.submit();
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
					this.form.action+="&toStatus=29";
					this.form.submit();
				}
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
        			data:{info_ids:ids,info_type:24,info_pos:info_pos},
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