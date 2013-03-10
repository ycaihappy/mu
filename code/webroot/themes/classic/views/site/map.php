<!DOCTYPE html>
<html lang="en">
<?php $this->widget("CommonHeaderWidget");?>  
<body>


<div id="p_map" class="pg-layout">
<?php $this->widget("TopWidget");?>  


<div class="layout head">
	<div class="m-logo">
		<a target="_self" href="" class="logo"><img title="xxx.com - xxxx" alt="zzz" src="images/logo.jpg"></a>
	</div>
	<div class="map1"></div>
	

</div>

<div class="layout main">
	<div class="m-map">
	<div class="hd"></div>
	<div class="bd">
		<table width="960" cellspacing="0" cellpadding="0" border="0">
      <tbody>
	  
	        <?php $this->widget("SiteMapWidget");?>  

</tbody></table>
	</div>
	
	</div>
		
		
	<div class="layout-area">
        <?php $this->widget("FooterWidget");?>  

	</div>
	

</div>
</div>

        <?php $this->widget("CommonFooterWidget");?>  

</body>
</html>
