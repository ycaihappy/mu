<?php
/**
 * _form.php
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @link http://code.google.com/p/srbac/
 */

/**
 * The create new auth item form.
 *
 * @author Spyros Soldatos <spyros@valor.gr>
 * @package srbac.views.authitem.manage
 * @since 1.0.0
 */
 ?>
<div class="srbacForm" >

  <p style="padding:5px;text-align:center;">
    字段标识有<span class="required">**</span>
    必须填写.
  </p>
  <?php echo SHtml::beginForm(); ?>

  <?php echo SHtml::errorSummary($model); ?>

  <div class="simple">
    <label>名称<span class="required">**</span>：</label>
      <?php if(!$model->getIsNewRecord())echo SHtml::hiddenField('TermGroup[group_id]',$model->group_id); ?>
    <?php echo SHtml::activeTextField($model,'group_name',array('size'=>20)); ?>
  </div>
  <div class="simple">
    <label>描述：</label>
    <?php echo SHtml::activeTextArea($model,'group_desc',array('rows'=>3, 'cols'=>20)); ?>
  </div>
  <?php if(Yii::app()->admin->hasFlash('updateSuccess')): ?>
  <div id="message"
       style="color:red;font-weight:bold;font-size:14px;text-align:center
       ;position:relative;border:solid black 2px;background-color:#DDDDDD"
       >
           <?php echo Yii::app()->admin->getFlash('updateSuccess'); ?>
           <?php
           Yii::app()->clientScript->registerScript(
               'myHideEffect',
               '$("#message").animate({opacity: 0}, 2000).fadeOut(500);',
               CClientScript::POS_READY
           );
           ?>
  </div>
   <?php elseif(Yii::app()->admin->hasFlash('updateError')): ?>
  <div id="message"
       style="color:red;font-weight:bold;font-size:14px;text-align:center
       ;position:relative;border:solid black 2px;background-color:#DDDDDD"
       >
           <?php echo Yii::app()->admin->getFlash('updateError'); ?>
           <?php
           Yii::app()->clientScript->registerScript(
               'myHideEffect',
               '$("#message").animate({opacity: 0}, 6000).fadeOut(400);',
               CClientScript::POS_READY
           );
           ?>
  </div>
  <?php endif; ?>

  <div class="action">
    <?php
    echo SHtml::ajaxSubmitButton(
    $update ? '修改' :
    '创建',
    $update ? array('saveTermGroup','group_id'=>$model->group_id) : array('saveTermGroup') ,
    array(
    'type'=>'POST',
    'update'=>'#preview',
    'complete'=>'function(){
    	window.updateYiiGridView();
    }',
    ), array('name'=>'saveButton'));
    ?>
  </div>
  <?php echo SHtml::endForm(); ?>

</div><!-- srbacForm -->
