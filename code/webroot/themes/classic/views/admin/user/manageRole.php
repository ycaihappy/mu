<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageNews'),
	'角色/任务/功能管理',
);

?>
<div style="width:50%;float:left;">
<div>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'button',
			'caption'=>'添加新权限项',
		'value'=>'asd',
		'cssFile'=>'jquery.ui.css',
		'onclick'=>'js:function(){
		    $.ajax({
		    				url:"'.Yii::app()->controller->createUrl("create").'",
        					type:"POST",
        					beforeSend:function(){
        						$("#preview").addClass("srbacLoading");
        					},
        					success:function(html){$("#preview").html(html)},
        					complete:function(){
        						$("#preview").removeClass("srbacLoading");
        					}
        				});
			return false;
		}',
		)
);
?>
</div>
<div id="list"><?php $this->renderPartial('authItemList',array(
	'dataProvider'=>$dataProvider,
))?>
</div>
</div>
<div id="preview" style="width:40%;float:left;padding:15px;">

</div>
<?php 
Yii::app()->getClientScript()->registerCssFile('css/srbac.css');
?>