<?php
$this->breadcrumbs=array(
	'全站设置'=>array('manageTerm'),
	'网站基本设置之描述',
);
?>
<div class="m-form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'basicSiteInfo-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

<table border="0" cellpadding="0" cellspacing="0" class="table-field" style="width:70%;height:400px;">
<tr>

		<td>
		<div id="descriptionTabs">
			<ul>
			    <li><a href="#basicDescription">关于我们</a></li>
			    <li><a href="#agrementDescription">使用协议</a></li>
			    <li><a href="#copyrightDescription">版权隐私</a></li>
		  	</ul>
		<div id="basicDescription">
				<?php 
				/*$this->widget('application.extensions.ckeditor.CKEditor',array( 
					"model"=>$model,
					"attribute"=>'basicDescription',
					"height"=>'400px',    
					"width"=>'600px',    
					'editorTemplate'=>'advanced',
					) 
				);*/
				$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'basicDescription',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 400px;'),
				));

				?>
				<?php echo $form->error($model,'basicDescription'); ?>
		</div>
		<div id="agrementDescription">
				<?php 
				/*$this->widget('application.extensions.ckeditor.CKEditor',array( 
					"model"=>$model,
					"attribute"=>'agrementDescription',
					"height"=>'400px',    
					"width"=>'600px',    
					'editorTemplate'=>'advanced',
					) 
				);*/
				$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'agrementDescription',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>80,'rows'=>20,'style'=>'width: 100%; height: 500px;'),
				));
				?>
				<?php echo $form->error($model,'agrementDescription'); ?>
		</div>
		<div id="copyrightDescription">
				<?php 
				/*$this->widget('application.extensions.ckeditor.CKEditor',array( 
					"model"=>$model,
					"attribute"=>'copyrightDescription',
					"height"=>'400px',    
					"width"=>'600px',    
					'editorTemplate'=>'advanced',
					) 
				);*/
				$this->widget('application.extensions.xheditor.JXHEditor', array(
				    'model' => $model,
				    'attribute' => 'copyrightDescription',
				    'htmlOptions'=>array('class'=>'xheditor-mfull','cols'=>200,'rows'=>15,'style'=>'width: 100%; height: 400px;'),
				));
				?>
				<?php echo $form->error($model,'copyrightDescription'); ?>
		</div>
		</div>

		</td>
</tr>

<tr>
<td align='right' colspan=2><?php echo CHtml::submitButton('保存'); ?></td>
</tr>
</table>
<br /><br />
<?php $this->endWidget(); ?>
</div><!-- form -->
<?php 
$initTab=<<<TABS
$("#descriptionTabs").tabs({collapsible:true});
TABS;
Yii::app()->clientScript->registerCoreScript('jquery.ui');
Yii::app()->clientScript->registerScript('description#update',$initTab);
?>