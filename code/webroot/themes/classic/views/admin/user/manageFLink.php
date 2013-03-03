<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	'友情链接管理',
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
<label>状态：</label>
<?php echo $form->dropDownList($model,'flink_status',$flinkStatus);?>
<label>链接名称：</label>
<?php echo $form->textField($model,'flink_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<form action='<?php echo  Yii::app()->controller->createUrl('changeFLinkStatus') ?>' method='post'>

<?php $this->endWidget(); ?>
<?php 

	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'flink_id',
        	'checkBoxHtmlOptions'=>array('name'=>'flink_id[]',),
        	'value'=>'$data->flink_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->flink_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'用户名',
        	'value'=>'$data->user->user_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'链接',
        	'type'=>'html',
        	'value'=>'CHtml::link($data->flink_url,$data->flink_url)',
        ),
        array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(
        	'name'=>'排序号',
        	'value'=>'$data->flink_order',
        	'htmlOptions'=>array('align'=>'center'),
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateFlink",array("flink_id"=>$data->flink_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle='友情链接';
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button1',
			'caption'=>'通过',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择通过的'.$alertTitle.'信息！");
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
			'caption'=>'撤销',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要撤销的'.$alertTitle.'信息！");
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
/*$this->widget('zii.widgets.jui.CJuiButton',
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
);*/
?>
</DIV>
</form>