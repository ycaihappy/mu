<?php
$artTypeName=$isNews?'新闻':'行情';
$this->breadcrumbs=array(
	'新闻行情管理'=>array('manageNews'),
	$artTypeName.'管理',
);
?>
<div><?php echo CHtml::button('添加'.$artTypeName,array('class'=>'btn-blue','onclick'=>'window.location.href="'.Yii::app()->controller->createUrl("updateArticle",array('type'=>$isNews?17:16,)).'"'))?></div>
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
<?php echo $form->dropDownList($model,'art_status',$artStatus);?>
<label>标题：</label>
<?php echo $form->textField($model,'art_title',array('class'=>'cmp-input'));?>
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
        	'id'=>'art_id',
        	'checkBoxHtmlOptions'=>array('name'=>'art_id[]',),
        	'value'=>'$data->art_id',
        ),
        array(
        	'name'=>'名称',
        	'value'=>'$data->art_title',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'发布人',
        	'value'=>'$data->createUser->user_name',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'审核人',
        	'value'=>'$data->art_check_by',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->art_post_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateArticle",array("art_id"=>$data->art_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>