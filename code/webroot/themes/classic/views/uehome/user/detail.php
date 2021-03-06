 <div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>个人资料</p>
</div>
<?php
$error = $model->getErrors();
if ( !empty($error))
{
?>
<div class="block-error">
<?php
    foreach ($error as $one_error)
    {
?>
    <p><?php echo $one_error[0];?></p>
<?php
    }
?>
</div>
<?php
}
elseif ( Yii::app()->user->hasFlash('success'))
{
?>
	<div class="hd">		
		<div class="block-error">
        <p><?php  echo Yii::app()->user->getFlash('success');?> </p>
		</div>
	</div>
<?php
}
?>
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'user-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
    <?php echo $form->hiddenField($model, 'user_name');?>
		<tr>
        <td class="label">用户名：</td><td><?php echo $model->user_name;?>
        
        </td>
		</tr>
		<tr>
        <td class="label">姓名：</td><td><?php echo $form->textField($model, 'user_first_name', array('class'=>'cmp-input'));?>
        <?php echo $form->error($model,'user_first_name'); ?>
        </td>
		</tr>
	<!--	<tr>
			<td class="label">姓别：</td><td><label><input type="radio" name="gender" value="0" />男</label> <input type="radio" name="gender" value="1" />女</label></td>
		</tr>-->
		<tr>
        <td class="label">邮箱：</td><td><?php echo $form->textField($model, 'user_email', array('class'=>'cmp-input','value'=>$model->user_email));?>
        <?php echo $form->error($model,'user_email'); ?>
        </td>
		</tr>
		<tr>
        <td class="label">性别：</td><td><?php echo $form->radioButtonList($model, 'user_sex',array(1=>'男',2=>'女'),array('template'=>'<span class="radio">{input}{label}</span>','separator'=>''));?>
        <?php echo $form->error($model,'user_sex'); ?>
        </td>
		</tr>
		<tr>
        <td class="label">昵称：</td><td><?php echo $form->textField($model, 'user_nickname',array('class'=>'cmp-input','value'=>$model->user_nickname));?>
        <?php echo $form->error($model,'user_nickname'); ?>
        </td>
		</tr>
		<tr>
        <td class="label">手机：</td><td><?php echo $form->textField($model, 'user_mobile_no', array('class'=>'cmp-input'));?>
        <?php echo $form->error($model,'user_mobile_no'); ?>
        </td>
		</tr>
		<tr>
        <td class="label">电话号码：</td><td><?php echo $form->textField($model, 'user_telephone', array('class'=>'cmp-input'));?>
        <?php echo $form->error($model,'user_telephone'); ?>
        </td>
		</tr>
		<tr>
		<!--	<td class="label">固定电话：</td><td><input type="text" name="photo_areacode
" value="0755" class="cmp-input" /><input type="text" name="photo" value="12121212" class="cmp-input" /></td>
		</tr>
		<tr>
			<td class="label">传真：</td><td><input type="text" name="fax_areacode
" value="0755" class="cmp-input" /><input type="text" name="fax" value="12121212" class="cmp-input" /></td>
		</tr>-->
		<tr>
			<td class="label">城市：</td>
			<td><?php echo $form->dropDownList($model, 'user_province_id',$province,array(
				'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#UserForm_user_city_id',
                    'data'=>array('province_id'=>"js:this.value")
				),
			));?>  
			<?php echo $form->dropDownList($model, 'user_city_id',$citys,array('empty'=>'选择城市'));?></td>
		</tr>
		<!--<tr>
			<td class="label">详细地址：</td><td><input type="text" name="address" value="深圳市" class="cmp-input w245" /></td>
		</tr>
		<tr>
			<td class="label">邮政编码：</td><td><input type="text" name="zipcode" value="4545454" class="cmp-input" /></td>
		</tr>-->
		<tr>
        <td class="label">钼市订阅：</td><td><?php echo $form->checkBox($model,'user_subscribe');?> </td>
		</tr>
		<!--<tr>
        <td class="label">审核通过时间：</td><td></td>
		</tr>-->
		
		<tr>
			<td></td><td><button type="submit" class="btn-modify">修改</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
