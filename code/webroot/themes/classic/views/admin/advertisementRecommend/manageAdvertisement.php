<?php
$this->breadcrumbs=array(
	'广告/推荐管理'=>array('manageAdvertisement'),
	'广告管理',
);
?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addAdv',
			'caption'=>'添加广告',
		'value'=>'asd',
		'onclick'=>'js:function(){
			window.location.href="'.$this->createUrl('updateAdvertisement').'";
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
<div style="float:right;">
<div>
<label>广告位置：</label>
<?php echo $form->dropDownList($model,'ad_no',$adPosition);?>
<label>媒体类型：</label>
<?php echo $form->dropDownList($model,'ad_type',$adType);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'ad_status',$adStatus);?>
<label>所属单位：</label>
<?php echo $form->textField($model,'ad_user_id',array('class'=>'cmp-input'));?>
<label>标题：</label>
<?php echo $form->textField($model,'ad_title',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索',array('class'=>'btn-a')); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form id="advForm" action='<?php echo  Yii::app()->controller->createUrl('changeAdvertisementStatus') ?>' method='post'>

<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'ad_id',
        	'checkBoxHtmlOptions'=>array('name'=>'ad_id[]',),
        	'value'=>'$data->ad_id',
        ),
        array(
        	'name'=>'广告名称',
        	'value'=>'$data->ad_title',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'所属人',
        	'value'=>'$data->user?$data->user->enterprise->ent_name:"钼市网"',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'位置',
        	'value'=>'$data->position?$data->position->term_name:"未指定"',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'媒体类型',
        	'value'=>'$data->type?$data->type->term_name:"未指定"',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'状态',
        	'value'=>'$data->status?$data->status->term_name:"未指定"',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       array(
        	'name'=>'点击量',
        	'value'=>'$data->ad_click_num',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->ad_create_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateAdvertisement",array("ad_id"=>$data->ad_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
$alertTitle='广告';
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'开启',
		'value'=>'asd',
		'onclick'=>'js:function(){
			var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要开启的'.$alertTitle.'信息！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeAdvertisementStatus',array('toStatus'=>1)).'";
					$("#advForm").ajaxSubmit(
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
			'caption'=>'关闭',
		'value'=>'asd',
		'onclick'=>'js:function(){
		var selectedProducts=$("#yw0 .select-on-check:checked");
			if(selectedProducts.size()<1)
			{
				alert("请选择要设关闭的'.$alertTitle.'！");
			}
			else
			{
				var url="'.Yii::app()->controller->createUrl('changeAdvertisementStatus',array('toStatus'=>2)).'";
					$("#advForm").ajaxSubmit(
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


?>
</DIV>
</form>
<br>
<br>
<?php 
$cs = Yii::app()->getClientScript();
$cs->registerScriptFile('/js/jquery.form.js');
?>