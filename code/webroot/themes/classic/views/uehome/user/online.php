    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>企业旺铺<i></i>添加友情链接</p>
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
    <div class="m-form" id="J_Message_Create">

<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'flink-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
            <td class="label">链接标题：</td><td><?php echo $form->textField($model, 'flink_name', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">链接URL：</td><td><?php echo $form->textField($model, 'flink_url', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
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
