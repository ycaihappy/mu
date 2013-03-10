    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>发送站内短信</p>
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
?>
    <div class="m-form" id="J_User_Suppy">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'message-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
        <?php echo $form->hiddenField($model, 'msg_to_user_id');?>
		<tr>
            <td class="label">收件人：</td><td><?php echo $form->textField($model, 'msg_to_user_name', array('class'=>'cmp-input'));?><span class="msg">不能包含“.,、/”等特殊字符</span>
            </td>
		</tr>
		<tr>
			<td class="label">主题：</td><td><?php echo $form->textField($model, 'msg_subject', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">内容：</td><td><?php echo $form->textArea($model,'msg_content',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
<?php 
if ( $view)
{
?>
    <td></td><td><button type="button" class="btn-save"><a href="<?php echo Yii::app()->controller->createUrl('/uehome/user/message');?>">返回</a></button></td>
<?php
}
else
{
?>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
<?php }?>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('css/ui-lightness/jquery-ui-1.10.1.custom.min.css');
Yii::app()->getClientScript()->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

?>
