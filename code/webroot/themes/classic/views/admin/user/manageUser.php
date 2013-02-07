<?php
$this->breadcrumbs=array(
	'用户管理'=>array('manageNews'),
	'会员管理',
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
<label>状态：</label>
<?php echo $form->dropDownList($model,'user_status',$userStatus);?>
<label>用户名：</label>
<?php echo $form->textField($model,'user_name',array('class'=>'cmp-input'));?>
<?php echo CHtml::submitButton('搜索'); ?>
</div>
</div>
<br style='float:clear;'/>
<?php $this->endWidget(); ?>
<?php 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'J_RoleList',
    'dataProvider'=>$dataProvider,
	'summaryText'=>'显示  {count} 条的第  {start}-{end} 条',
	'selectableRows'=>2,
    'columns'=>array(
        array(
        	'header'=>'选择',
        	'class'=>'CCheckBoxColumn',
        	'id'=>'user_id',
        	'checkBoxHtmlOptions'=>array('name'=>'user_id[]',),
        	'value'=>'$data->user_id',
        ),
        array(
        	'name'=>'用户名',
        	'value'=>'$data->user_name',
        ),  // display the 'name' attribute of the 'category' relation
        array(
        	'name'=>'角色',
        	'value'=>'$data->user_type',
        ),
        array(
        	'name'=>'昵称',
        	'value'=>'$data->user_nickname',
        ),   // display the 'content' attribute as purified HTML
        array(
        	'name'=>'所属企业',
        	'value'=>'$data->enterprise->ent_name',
        	'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
       array(
        	'name'=>'状态',
        	'value'=>'$data->status->term_name',
       		'htmlOptions'=>array('align'=>'center'),
        ),   // display the 'content' attribute as purified HTML
       
        array(            // display 'create_time' using an expression
            'name'=>'创建时间',
            'value'=>'date("Y-m-d H:i:s", strtotime($data->user_join_date))',
        ),
        array(            // display a column with "view", "update" and "delete" buttons
            'header'=>'操作',
        	'class'=>'CMUButtonColumn',
        	'template'=>'{update}{assignRole}',
        	'buttons'=>array(
        		'assignRole'=>array(
        			'options'=>array('class'=>'ico-set','data-id'=>'$data->user_id'),
        		),
       		 ),
        	'updateButtonUrl'=>'Yii::app()->controller->createUrl("updateUser",array("user_id"=>$data->user_id))',
        	'updateButtonLabel'=>'修改',
        	),
    ),
));
?>
<!--m-table-list-->
	<div class="m-role-op hide" id="J_RoleOperate" data-post-api="api/postRole.php">
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
?>