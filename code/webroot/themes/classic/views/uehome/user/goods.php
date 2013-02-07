    <div class="m-breadcrumb">
        <p><b class="crumb"></b>会员中心<i></i>发布现货信息</p>
    </div>
    <div class="m-form">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'product-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
			<td class="label">现货名称：</td><td><?php echo $form->textField($model, 'product_name', array('class'=>'cmp-input','value'=>''));?><span class="msg">不能包含“.,、/”等特殊字符</span></td>
		</tr>
		<tr>
			<td class="label">关键字：</td><td><?php echo $form->textField($model, 'product_keyword', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
			
		<tr>
			<td class="label">现货品类：</td><td><?php echo $form->dropDownList($model, 'product_type_id', array('0'=>'钼铁','1'=>'钼精矿'));?></td>
		</tr>
        <tr>
           <td class="label">地点：</td><td><?php echo $form->dropDownList($model, 'district',array('0'=>'地区','1'=>'北京'));?><?php echo $form->dropDownList($model, 'province',array('0'=>'省份','1'=>'湖北'));?><?php echo $form->dropDownList($model, 'product_city_id',array('0'=>'市','1'=>'天门'));?></td>
        </tr>
		<tr>
        <td class="label">数量：</td><td><?php echo $form->dropDownList($model, 'product_unit', array('0'=>'吨','1'=>'千克'));?></td>
		</tr>		
		<tr>
            <td class="label">价格：</td><td><?php echo $form->textField($model, 'product_price', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
			<td class="label">现货描述：</td><td><?php echo $form->textArea($model,'product_content',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
			<td class="label">现货附图：</td><td><img src="images/thumb.gif" class="thumb"><input type="file" name="photo" value="浏览" /></td>
		</tr>
		<tr>
            <td class="label">有效时间至：</td><td><?php echo $form->textField($model, 'product_join_date', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
			<td></td><td><button type="submit" class="btn-save">发布/保存</button></td>
		</tr>
		
	</table>
<?php $this->endWidget();?>
</div>
