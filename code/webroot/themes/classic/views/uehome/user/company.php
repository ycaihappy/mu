<?php
$error = $model->getErrors();
?>
            <div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>查看企业信息</p>
</div>
<?php
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
    'id'=>'enterprise-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
			<td colspan="2"><h3 class="b-title">企业资料</h3></td>
		</tr>
		<tr>
			<td class="label">企业名称：</td><td><?php echo $form->textField($model, 'ent_name', array('class'=>'cmp-input'));?>
		</td>
		</tr>
		<!--<tr>
			<td class="label">工商注册号：</td><td><input type="text" name="company_no" value="" class="cmp-input" /></td>
		</tr> -->
		<tr>
			<td class="label">企业类型：</td><td><?php echo $form->dropDownList($model, 'ent_type', $ent_type);?></td>
		</tr>
		<tr>
			<td class="label">经营方式：</td><td><?php echo $form->dropDownList($model, 'ent_business_model', $business_type);?></td>
		</tr>
		<tr>
			<td class="label">经营范围：</td><td><?php echo $form->textField($model, 'ent_business_scope', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
           <td class="label">经营地点：</td><td><?php echo CHtml::dropDownList( 'province',$province,$allProvince,array(
           
           'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#Enterprise_ent_city',
                    'data'=>array('province_id'=>"js:this.value")
				),
           ));?> <?php echo $form->dropDownList($model, 'ent_city',$allCity,array('empty'=>'选择城市'));?></td>
        </tr>
		<tr>
			<td class="label">详细地址：</td><td><?php echo $form->textField($model, 'ent_location', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">公司网址：</td><td><?php echo $form->textField($model, 'ent_website', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">邮编：</td><td><?php echo $form->textField($model, 'ent_zipcode', array('class'=>'cmp-input'));?></td>
		</tr>		
		
		<tr>
			<td class="label">公司介绍：</td><td>
			<?php 
			$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'ent_introduce',
				    'htmlOptions'=>array('class'=>'xheditor-mini','cols'=>80,'rows'=>20,'style'=>'width: 600px; height: 400px;'),
				));
			//echo $form->textArea($model,'ent_introduce',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); 
			?></td>
		</tr>
		<tr>
			<td colspan="2"><h3 class="b-title">其他信息</h3></td>
		</tr>
		<!--<tr>
			<td class="label">年营业额：</td><td><input type="text" name="turnover" value="" class="cmp-input" /></td>
		</tr>
		<tr>
			<td class="label">品牌名称：</td><td><input type="text" name="brand" value="" class="cmp-input" /></td>
		</tr> -->
		<tr>
			<td class="label">注册资本：</td><td><?php echo $form->textField($model, 'ent_registered_capital', array('class'=>'cmp-input'));?><span class="msg">(万元)</span></td>
		</tr>
		<!--<tr>
			<td class="label">公司成立年份：</td><td><select name="company_date"><option value="0">2013</option></select></td>
		</tr>-->
		<tr>
			<td class="label">法人代表：</td><td><?php echo $form->textField($model, 'ent_chief', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
	</div>
