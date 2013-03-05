    		<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>发布供求信息</p>
</div>
    <div class="m-form" id="J_User_Suppy">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'supply-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
		<tr>
            <td class="label">类型：</td><td><?php echo $form->dropDownList($model, 'supply_category', $supply_type);?></td>
		</tr>
		<tr>
            <td class="label">名称：</td><td><?php echo $form->textField($model, 'supply_name', array('class'=>'cmp-input','value'=>''));?><span class="msg">不能包含“.,、/”等特殊字符</span></td>
		</tr>
		<tr>
			<td class="label">关键字：</td><td><?php echo $form->textField($model, 'keywords', array('class'=>'cmp-input','value'=>''));?></td>
		</tr>
		<tr>
			<td class="label">供求品类：</td><td><?php echo CHtml::dropDownList('parent_category',$parentCategory,$category,array(
				 'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getChildrenTerm'),
                    'update'=>'#SupplyForm_category',
                    'data'=>array('parent_id'=>"js:this.value",'group_id'=>14)
				),
			));?> <?php echo $form->dropDownList($model, 'category', $smallCategory,array('empty'=>'选择品类'));?></td>
		</tr>
		<tr>
            <td class="label">品质：</td><td><?php echo $form->dropDownList($model, 'muContent', $allMuContent);?></td>
		</tr>
		<tr>
           <td class="label">地点：</td><td><?php echo CHtml::dropDownList( 'province',$province,$allProvince,array(
           'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#SupplyForm_city',
                    'data'=>array('province_id'=>"js:this.value")
				),
           ));?> <?php echo $form->dropDownList($model, 'city',$allCity,array('empty'=>'选择城市'));?></td>
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
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('css/ui-lightness/jquery-ui-1.10.1.custom.min.css');
Yii::app()->getClientScript()->registerScriptFile('js/jquery.1.8.min.js');
Yii::app()->getClientScript()->registerScriptFile('js/jquery.ui.js');

?>
