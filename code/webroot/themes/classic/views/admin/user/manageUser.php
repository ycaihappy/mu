<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageUser'),
	$adminUser?'管理员管理':'会员管理',
);

?>
<div class='changeSuccess'><?php echo Yii::app()->admin->getFlash('changeStatus');?></div>
<div class='changeError'><?php echo Yii::app()->admin->getFlash('changeStatusError');?></div>
<div style="float:left;">
<?php 
if($adminUser)
{
	$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'button',
				'caption'=>'添加管理员',
			'value'=>'asd',
			'cssFile'=>'jquery.ui.css',
			'onclick'=>'js:function(){
			    location.href="'.Yii::app()->controller->createUrl('updateAdminUser').'";
			}',
			)
	);
}
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
<label>状态：</label>
<?php echo $form->dropDownList($model,'user_status',$userStatus);?>
<label>用户名：</label>
<?php echo $form->textField($model,'user_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<form action='<?php echo  Yii::app()->controller->createUrl('changeUserStatus') ?>' method='post'>

<?php 
	$list=$adminUser?'adminUserList':'userList';
	$this->renderPartial($list,array('dataProvider'=>$dataProvider));
?>
<DIV>
<input type="hidden" name="page" value="<?php echo Yii::app()->request->getParam('page',1);?>"/>
<?php 
if(!$adminUser):
	$alertTitle='用户';
	$this->widget('zii.widgets.jui.CJuiButton',
		array(
			'name'=>'button',
				'caption'=>'通过审核',
			'value'=>'asd',
			'onclick'=>'js:function(){
				var selectedProducts=$("#J_RoleList .select-on-check:checked");
				if(selectedProducts.size()<1)
				{
					alert("请选择要通过审核的'.$alertTitle.'信息！");
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
				'caption'=>'拒绝通过',
			'value'=>'asd',
			'onclick'=>'js:function(){
			var selectedProducts=$("#J_RoleList .select-on-check:checked");
				if(selectedProducts.size()<1)
				{
					alert("请选择要拒绝通过审核的'.$alertTitle.'信息！");
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
endif;
?>
</DIV>
</form>
<!--m-table-list-->
	<div class="m-role-op hide" id="J_RoleOperate" data-post-api="<?php echo Yii::app()->controller->createUrl("assign");?>">
	<table border="0" cellpadding="0" cellspacing="0" >
	<tr><td>已分配角色</td><td></td><td>未分配角色</td></tr>
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

?>