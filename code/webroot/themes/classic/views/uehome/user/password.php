    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>个人资料<i></i>修改密码</p>
</div>
<?php $this->renderPartial('updateTip'); ?>
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'password-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
<?php echo $form->errorSummary($model,'<div class="info_warining"><p>您填写的信息不符合一下规则：</p>','</div>');?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		
		<tr>
			<td class="label">旧密码：</td><td><?php echo $form->passwordField($model, 'old_pwd', array('class'=>'cmp-input'));?>
			<?php echo $form->error($model,'old_pwd')?>
			</td>
		</tr>
		<tr>
			<td class="label">新密码：</td><td><?php echo $form->passwordField($model, 'new_pwd', array('class'=>'cmp-input'));?>
			<?php echo $form->error($model,'new_pwd')?></td>
		</tr>
		<tr>
			<td class="label">确认密码：</td><td><?php echo $form->passwordField($model, 'new_repwd', array('class'=>'cmp-input'));?>
			<?php echo $form->error($model,'new_repwd')?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-modify">修改</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
		
