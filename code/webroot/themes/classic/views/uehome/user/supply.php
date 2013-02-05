	<div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'supply-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
            <td class="label">类型：</td><td><?php echo $form->dropDownList($model, 'supply_category', array('0'=>'供应','1'=>'求购'));?></td>
		</tr>
		<tr>
            <td class="label">名称：</td><td><?php echo $form->textField($model, 'supply_name', array('class'=>'cmp-input','value'=>''));?><span class="msg">不能包含“.,、/”等特殊字符</span></td>
		</tr>
		<tr>
			<td class="label">关键字：</td><td><?php echo $form->textField($model, 'keywords', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
        <td class="label">品类：</td><td><?php echo $form->dropDownList($model, 'category', array('0'=>'钼铁','1'=>'钼精矿'));?></td>
		</tr>
		<tr>
        <td class="label">地点：</td><td><?php echo $form->dropDownList($model, 'district',array('0'=>'地区','1'=>'北京'));?><?php echo $form->dropDownList($model, 'province',array('0'=>'省份','1'=>'湖北'));?><?php echo $form->dropDownList($model, 'city',array('0'=>'市','1'=>'天门'));?></td>
		</tr>
		<tr>
        <td class="label">地址：</td><td><?php echo $form->textField($model, 'address', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
        <td class="label">电话：</td><td><?php echo $form->textField($model, 'tel', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
        <td class="label">价格：</td><td><?php echo $form->textField($model, 'price', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
        <td class="label">信息描述：</td><td><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
			<td class="label">信息附图：</td><td><img src="images/thumb.gif" class="thumb"><input type="file" name="photo" value="浏览" /></td>
		</tr>
		<tr>
        <td class="label">有效时间至：</td><td><?php echo $form->textField($model, 'effective_time', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
