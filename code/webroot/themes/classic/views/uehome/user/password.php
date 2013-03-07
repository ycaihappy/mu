    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>个人资料<i></i>修改密码</p>
</div>
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'password-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		
		<tr>
			<td class="label">旧密码：</td><td><?php echo $form->textField($model, 'old_pwd', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">新密码：</td><td><?php echo $form->textField($model, 'new_pwd', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">确认密码：</td><td><?php echo $form->textField($model, 'new_repwd', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-modify">修改</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
		
