<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageNews'),
	'角色/任务/功能管理',
);

?>
<div style="width:50%;float:left;">
<div style="float:left;">
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
<div style="float:right;">
<?php 
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'search-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));
?>
<?php echo $form->dropDownList($model,'type',$type,array('class'=>'cmp-input','style'=>''));?>

<?php echo $form->textField($model,'name',array('class'=>'cmp-input'));?>
<?php 
$this->widget('zii.widgets.jui.CJuiButton',
	array(
		'name'=>'buttonSearch',
		'caption'=>'搜索',
		'buttonType'=>'submit',
		'cssFile'=>'jquery.ui.css'
		)
);
$this->endWidget();    
?></div>
<?php echo SHtml::beginForm(); ?>
<div id="list" style="clear:both;"><?php $this->renderPartial('authItemList',array(
	'dataProvider'=>$dataProvider
))?>
<div>
<?php 
echo SHtml::ajaxSubmitButton(
    '删除所选功能项',
    array('deleteAuthItem') ,
    array(
    'type'=>'POST',
    'success'=>'function(html){
    	$.fn.yiiGridView.update("J_RoleList");
    }',
    ));
    
?>
</div>
<?php echo SHtml::endForm(); ?>
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
$saveScript=<<<SAVE
window.updateYiiGridView=function(){
	$.fn.yiiGridView.update('J_RoleList');
};
SAVE;
Yii::app()->getClientScript()->registerScript('Auth#saveOrUpdate',$saveScript);
?>