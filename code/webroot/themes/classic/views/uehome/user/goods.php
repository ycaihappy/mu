    <div class="m-breadcrumb">
        <p><b class="crumb"></b>会员中心<i></i>发布现货信息</p>
    </div>
    <div class="m-form" id="J_User_Suppy">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'product-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
        <?php echo $form->hiddenField($model, 'product_id');?>
		<tr>
			<td class="label">现货名称：</td><td><?php echo $form->textField($model, 'product_name', array('class'=>'cmp-input'));?><span class="msg">不能包含“.,、/”等特殊字符</span></td>
		</tr>
		<tr>
			<td class="label">关键字：</td><td><?php echo $form->textField($model, 'product_keyword', array('class'=>'cmp-input'));?></td>
		</tr>
			
		<tr>
			<td class="label">现货品类：</td><td><?php echo CHtml::dropDownList('product_parent_type',$parentType,$product_type,array(
				 'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getChildrenTerm'),
                    'update'=>'#ProductForm_product_type_id',
                    'data'=>array('parent_id'=>"js:this.value",'group_id'=>14)
				),
			));?> <?php echo $form->dropDownList($model, 'product_type_id', $product_smallType,array('empty'=>'选择品类'));?></td>
		</tr>
        <tr>
           <td class="label">地点：</td><td><?php echo CHtml::dropDownList( 'province',$province,$allProvince,array(
           
           'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#ProductForm_product_city_id',
                    'data'=>array('province_id'=>"js:this.value")
				),
           ));?> <?php echo $form->dropDownList($model, 'product_city_id',$allCity,array('empty'=>'选择城市'));?></td>
        </tr>
		<tr>
        <td class="label">数量：</td><td><?php echo $form->textField($model, 'product_quanity', array('class'=>'cmp-input'));?>/<?php echo $form->dropDownList($model, 'product_unit', $unit_type);?></td>
		</tr>	
		<tr>
            <td class="label">价格：</td><td><?php echo $form->textField($model, 'product_price', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">现货描述：</td><td><?php echo $form->textArea($model,'product_content',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
			<td class="label">现货附图：</td><td><img src="images/thumb.gif" class="thumb" id="image_thumb"><button type="button" class="btn-modify btn-select">选择图片</button><input type="text" name="image_src" value="" id="image_src"/></td>
		</tr>
		<tr>
            <td class="label">有效时间至：</td><td><?php echo $form->textField($model, 'product_join_date', array('class'=>'cmp-input'));?></td>
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
Yii::app()->getClientScript()->registerScriptFile('js/jquery.1.8.min.js');
Yii::app()->getClientScript()->registerScriptFile('js/jquery.ui.js');

?>