	<?php 
#$this->widget("BreadCrumbWidget", array('crumbs'=>array(
#    array('name'=>'现货供求','link'=>'#'),
#    array('name'=>'供求详细', 'link'=>'#')
#)));
?>
	<div class="grid-690">
		<!---->
		
    <?php $this->widget("SupplyDetailWidget");?>
	  
		</div>
	<div class="grid-260">
	
<?php $this->widget("SupplyIndexSpecialWidget");?>
	
	</div>
		
