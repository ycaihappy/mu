<?php
if ( Yii::app()->user->hasFlash('validateError'))
{
?>
	<div class="hd">		
		<div class="block-error">
        <p><?php  echo Yii::app()->user->getFlash('validateError');?> </p>
		</div>
	</div>
<?php
}
?>
<?php
if ( Yii::app()->user->hasFlash('validateSuccess'))
{
?>
	<div class="hd">		
		<div class="block-success">
        <p><?php  echo Yii::app()->user->getFlash('validateSuccess');?> </p>
		</div>
	</div>
<?php
}
?>