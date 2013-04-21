<?php 
$this->breadcrumbs=array(
	'系统'=>array('manageMessageTemplate'),
	'数据备份'
);
?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'backup',
			'caption'=>'开始新备份',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    $.ajax(
				{
					url:"'.Yii::app()->controller->createUrl("dataBack/backup").'",
        			type:"POST",
        			success:function(msg){
        				alert(msg);
        				$.fn.yiiGridView.update("yw0");
        			},
        			error:function(){
        				alert("请求发送失败!");
        			},
				}
				);;
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
<?php $this->endWidget(); ?>
<form id="dataBackForm" action='' method='post'>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
    'columns'=>array(
        array(
        	'name'=>'备份名称',
        	'value'=>'$data["name"]',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'文件大小',
        	'value'=>'$data["size"]',
        ),   // display the 'content' attribute as purified HTML
        array(            // display 'create_time' using an expression
            'name'=>'备份时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data["time"]))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CButtonColumn',
        	'template'=>'{update}{delete}',
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("downloadbak",array("file"=>$data["name"]))',
        	'updateButtonImageUrl'=>'/css/imgs/download.png',
        	'updateButtonLabel'=>'下载此备份',
            'deleteButtonLabel'=>'删除该备份',
        	'deleteButtonUrl'=>'Yii::app()->controller->createUrl("delete_back",array("file"=>$data["name"]))',
        	'deleteConfirmation'=>'确认删除此备份？',
        	'deleteButtonImageUrl'=>'/css/imgs/delete.jpg',
        	),
    ),
));
?>
</form>