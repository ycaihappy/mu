    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>查看企业信息</p>
</div>
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
			<td class="label">企业名称：</td><td><?php echo $form->textField($model, 'ent_name', array('class'=>'cmp-input','value'=>$model->ent_name));?>
		</td>
		</tr>
		<!--<tr>
			<td class="label">工商注册号：</td><td><input type="text" name="company_no" value="" class="cmp-input" /></td>
		</tr>
		<tr>
			<td class="label">企业类型：</td><td><select name="company_category"><option value="0">国有企业</option></select></td>
		</tr>-->
		<tr>
			<td class="label">经营模式：</td><td><?php echo $form->dropDownList($model, 'ent_type', array('0'=>'生产型','1'=>'贸易型'));?></td>
		</tr>
		<tr>
			<td class="label">主营产品：</td><td><?php echo $form->textField($model, 'ent_business_scope', array('class'=>'cmp-input','value'=>$model->ent_business_scope));?></td>
		</tr>
		<tr>
			<td class="label">经营地点：</td><td><?php echo $form->dropDownList($model, 'ent_city',array('0'=>'市','1'=>'天门'));?></td>
		</tr>
		<tr>
			<td class="label">详细地址：</td><td><?php echo $form->textField($model, 'ent_location', array('class'=>'cmp-input','value'=>$model->ent_location));?></td>
		</tr>
		<tr>
			<td class="label">公司网址：</td><td><?php echo $form->textField($model, 'ent_website', array('class'=>'cmp-input','value'=>$model->ent_website));?></td>
		</tr>
		<tr>
			<td class="label">邮编：</td><td><?php echo $form->textField($model, 'ent_zipcode', array('class'=>'cmp-input','value'=>$model->ent_zipcode));?></td>
		</tr>		
		
		<tr>
			<td class="label">公司介绍：</td><td><?php echo $form->textArea($model,'ent_introduce',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
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
			<td class="label">注册资本：</td><td><?php echo $form->textField($model, 'ent_registered_capital', array('class'=>'cmp-input','value'=>$model->ent_registered_capital));?><span class="msg">(万元)</span></td>
		</tr>
		<!--<tr>
			<td class="label">公司成立年份：</td><td><select name="company_date"><option value="0">2013</option></select></td>
		</tr>-->
		<tr>
			<td class="label">法人代表：</td><td><?php echo $form->textField($model, 'ent_chief', array('class'=>'cmp-input','value'=>$model->ent_chief));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
	</div>
