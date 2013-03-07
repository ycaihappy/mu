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
	<?php echo $form->errorSummary($model,'<div class="info_warining"><p>您填写的信息不符合一下规则：</p>','</div>');?>
	<table border="0" cellpadding="0" cellspacing="0" class="table-field">
        <?php echo $form->hiddenField($model, 'supply_id');?>
		<tr>
            <td class="label">类型：</td><td><?php echo $form->dropDownList($model, 'supply_category', $supply_type);?>
            <?php echo $form->error($model,'supply_category');?>
            </td>
		</tr>
		<tr>
            <td class="label">名称：</td><td><?php echo $form->textField($model, 'supply_name', array('class'=>'cmp-input'));?><span class="msg">不能包含“.,、/”等特殊字符</span>
            <?php echo $form->error($model,'supply_name');?>
            </td>
		</tr>
		<tr>
			<td class="label">关键字：</td><td><?php echo $form->textField($model, 'supply_keyword', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
			<td class="label">供求品类：</td><td><?php echo CHtml::dropDownList('parent_category',$parentCategory,$category,array(
				 'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getChildrenTerm'),
                    'update'=>'#SupplyForm_category',
                    'data'=>array('parent_id'=>"js:this.value",'group_id'=>14)
				),
			));?> <?php echo $form->dropDownList($model, 'category', $smallCategory,array('empty'=>'选择品类'));?>
			<?php echo $form->error($model,'category');?>
			</td>
		</tr>
		<tr>
            <td class="label">品阶：</td><td><?php echo $form->dropDownList($model, 'muContent', $allMuContent);?>
            <?php echo $form->error($model,'muContent');?>
            </td>
		</tr>
		<tr>
            <td class="label">含水量：</td><td><?php echo $form->dropDownList($model, 'waterContent', $allWaterContent);?></td>
		</tr>
		<tr>
           <td class="label">地点：</td><td><?php echo CHtml::dropDownList( 'province',$province,$allProvince,array(
           'ajax'=>array(
					'type'=>'GET',
                    'url'=>CController::createUrl('getCity'),
                    'update'=>'#SupplyForm_city',
                    'data'=>array('province_id'=>"js:this.value")
				),
           ));?> <?php echo $form->dropDownList($model, 'city',$allCity,array('empty'=>'选择城市'));?>
           <?php echo $form->error($model,'city');?>
           </td>
        </tr>
		<tr>
        <td class="label">地址：</td><td><?php echo $form->textField($model, 'address', array('class'=>'cmp-input'));?></td>
		</tr>
		<tr>
        <td class="label">电话：</td><td><?php echo $form->textField($model, 'tel', array('class'=>'cmp-input'));?>
        <?php echo $form->error($model,'tel');?>
        </td>
		</tr>
		<tr>
        <td class="label">价格：</td><td><?php echo $form->textField($model, 'price', array('class'=>'cmp-input'));?>元
        <?php echo $form->error($model,'price');?>
        </td>
		</tr>
		<tr>
        <td class="label">信息描述：</td><td><?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50,'class'=>'cmp-text')); ?></td>
		</tr>
		<tr>
			<td class="label">信息附图：</td><td><img src="<?php echo $model->image?'/images/commonProductsImages/thumb/thumb_'.$model->image:'/images/thumb.gif'?>" class="thumb" id="image_thumb"><button type="button" class="btn-modify btn-select">选择图片</button>
			<input type="hidden" name="SupplyForm[image]" value="<?php echo $model->image?>" id="image_src"/></td>
		</tr>
		<tr>
        <td class="label">有效时间至：</td><td><?php echo $form->textField($model, 'effective_time', array('class'=>'cmp-input'));?>
        <?php echo $form->error($model,'effective_time');?>
        </td>
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
