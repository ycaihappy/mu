	<div class="m-breadcrumb">
	<p><b class="crumb"></b>会员中心<i></i>在线客服管理</p>
    </div>
<?php
if ( Yii::app()->user->hasFlash('success'))
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
	<div class="m-form m-qq-set" id="J_AddQQ">
	
<?php $form = $this->beginWidget('CActiveForm', array(
    'id'=>'online-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
));?>
	<ul>
<?php
    if ( !empty($model->contact_name) )
    {
        $total = count($model->contact_name);
        for($i=0;$i<$total;$i++)
        {
            $class = ($i==$total-1) ? 'act remove' : 'act add';
            $flag = ($i==$total-1) ? '-' : '+';
            $hidden_value = isset($model->contact_id[$i]) ? $model->contact_id[$i] : '';
?>
   <?php echo $form->hiddenField($model, 'contact_id[]',array('value'=>$hidden_value));?>
        <li>
        <label >名称：</label><?php echo $form->textField($model, 'contact_name[]', array('class'=>'cmp-input','value'=>$model->contact_name[$i]));?><label>QQ号码：</label><?php echo $form->textField($model, 'contact_value[]', array('class'=>'cmp-input','value'=>$model->contact_value[$i]));?><span class="<?php echo $class;?>"><?php echo $flag;?></span>
		</li>
<?php
        }
    }
    else
    {
?>
		<li>
			<label >名称：</label><?php echo $form->textField($model, 'contact_name[]', array('class'=>'cmp-input'));?><label>QQ号码：</label><?php echo $form->textField($model, 'contact_value[]', array('class'=>'cmp-input'));?><span class="act add">+</span>
		</li>
		<li>
			<label >名称：</label><?php echo $form->textField($model, 'contact_name[]', array('class'=>'cmp-input'));?><label>QQ号码：</label><?php echo $form->textField($model, 'contact_value[]', array('class'=>'cmp-input'));?><span class="act remove">-</span>
		</li>
<?php
    }
?>
		<li class="btn">
			<button type="submit" class="btn-save">保存</button>
		</li>		
	
	</ul>
<?php $this->endWidget();?>
</div>
