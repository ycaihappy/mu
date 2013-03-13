<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
$this->widget('storeFront.widgets.temp2.FrontHeadStyle');
?>
<body>
<div id="header">
<?php
$this->widget('storeFront.widgets.temp2.FrontHeader');
?>
</div>

<div id="main">

<?php $this->widget('storeFront.widgets.temp2.FrontFlash'); ?>

	<div class="tp"></div>
    <div id="menu">
    <?php
			$this->widget('storeFront.widgets.temp2.FrontLeftMenu');
		?>
    </div>
    <div id="content">
		<?php echo $content;?>
    </div>
</div>
<div>
<div id="bottom">
<?php $this->widget('storeFront.widgets.temp2.FrontBottom');?>
</div>
</div>
</body>
</html>