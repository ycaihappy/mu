<?php
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	'图库管理',
);
?>

<div>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addSingle',
			'caption'=>'添加单张图片',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    window.location.href="'.Yii::app()->controller->createUrl("updateImageLibary").'";
		}',
		)
);
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'addBatch',
			'caption'=>'批量添加图片',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    window.location.href="'.Yii::app()->controller->createUrl("batchUploadImage").'";
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
<label>所属分类：</label>
<?php echo $form->dropDownList($model,'image_used_type',$imageUsedType);?>
<label>状态：</label>
<?php echo $form->dropDownList($model,'image_status',$imageStatus);?>
<label>图片标题：</label>
<?php echo $form->textField($model,'image_title',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
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
        	'id'=>'image_id',
        	'checkBoxHtmlOptions'=>array('name'=>'image_id[]',),
        	'value'=>'$data->image_id',
        ),
        array(
        	'name'=>'名称',
        	'type'=>'html',
        	'value'=>'"<img src=\"images/commonProductsImages/thumb/".$data->image_thumb_src."\" height=\"150\" alt=\"".$data->image_title."\" >"',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'所属分类',
        	'value'=>'$data->image_used_type',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'上传人',
        	'value'=>'$data->createUser->user_name',
        ),   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->image_added_time))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateImageLibary",array("image_id"=>$data->image_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>