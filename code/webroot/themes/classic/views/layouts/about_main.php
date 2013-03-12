<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>联系我们</title>
    <link rel="stylesheet" href="css/global.css">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<link rel="shortcut icon" type="image/png" href="/img/favicon.png">


</head>

<body>


<div id="p_contact" class="pg-layout">
<?php $this->widget('TopWidget');?>

<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="<?php echo $this->createUrl('/site/index')?>" class="logo"><img title="mushw.com - 钼市网" alt="zzz" src="/images/logo.jpg"></a>
	</div>
	
	

</div>

<div class="layout main">
	
	
	
	
	
	<div class="m-contact">
	<div class="hd"></div>
	<div class="bd">
	
	<div class="grid-230">
	<div class="leftMenu">
<h3>关于我们</h3>
  <div><ul>
     <li><a href="<?php echo $this->createUrl('/about/index')?>">网站简介</a></li>   
 </ul></div>
	<h3>联系我们</h3>
  <div><ul>
    <li><a href="<?php echo $this->createUrl('/about/contact')?>">联系我们</a></li>
 </ul>
  
  </div>
   <h3>使用协议</h3>
  <div><ul>
    <li><a href="<?php echo $this->createUrl('/about/agrement')?>">使用协议</a></li>
 </ul></div>
 <h3>版权隐私</h3>
  <div><ul>
    <li><a href="<?php echo $this->createUrl('/about/copyRight')?>">版权隐私</a></li>
    </ul></div>
</div>
	
	</div>
	
	<div class="grid-720">
		<div class="ad"><img src="images/contactAdv.jpg" width="720" /></div>
		<?php echo $content;?>
	</div>
	<div class="clearfix"></div>
	</div>
	
	</div>
	<div class="layout-area">
		<?php $this->widget("FooterWidget");?>
	</div>
	

</div>
</div>

<?php 
$this->widget("CommonFooterWidget");
?>
</body>
</html>