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
	'dataProvider'=>$dataProvider
))?>
</div>
</div>
<div id="preview" style="width:40%;float:left;padding:15px;">

</div>
	<div class="m-role-op hide" id="J_RoleOperate" data-post-api="<?php echo Yii::app()->controller->createUrl("assign");?>">
	<table border="0" cellpadding="0" cellspacing="0" >
	<tr><td>未分配功能</td><td></td><td>已有功能</td></tr>
	<tr>
	<td>
	<ul class="list-from"></ul>
	</td>
	<td>
	<button class="btn-b addone">&gt;</button>
	<button class="btn-b addall">&gt;&gt;</button>
	<button class="btn-b delall">&lt;&lt;</button>
	<button class="btn-b delone">&lt;</button>
	</td>
	<td>
	<ul class="list-to"></ul>
	</td>
	</tr>
	<tr><td colspan="3" align="right"><button class="btn-a save">保存</button></td></tr>
	</table>
	</div>
	
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery.ui');
Yii::app()->getClientScript()->registerCssFile('css/srbac.css');
?>