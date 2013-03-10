<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="/css/admin.css">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">
</head>

<body>
<?php if(isset($this->breadcrumbs)):?>
	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'homeLink'=>false,
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->
<?php endif?>
<br/>
<div id="p_member" class="pg-layout">
<?php echo $content;?>
</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCoreScript('jquery');
$cs->registerScriptFile('/js/config.js');
$cs->registerScriptFile('/js/admin.js');
$cs->registerScriptFile('/js/init.js');
?>
</body>
</html>
