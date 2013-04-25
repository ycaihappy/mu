		<div class="ad"><img src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>" width="700" height="211" /></div>
		<div class="service-hd ui-m-border">
			<span></span>
		</div>
		<div class="servicesListTable ui-m-border">
<?php if ( isset($subCatService[105]) && isset($subCatService[106]) && isset($subCatService[104])
&& isset($subCatService[107]) && isset($subCatService[108]) && isset($subCatService[109]) )
{
?>	

		  <ul>
		  <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[105]->art_id))?>"><?php echo $subCatService[105]->art_title?></a></h4>
		      <p><?php echo $subCatService[105]->art_summary?></p>
		 </li>
		  <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[106]->art_id))?>"><?php echo $subCatService[106]->art_title?></a></h4>
		      <p><?php echo $subCatService[106]->art_summary?></p>
		  </li>
		   <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[107]->art_id))?>"><?php echo $subCatService[107]->art_title?></a></h4>
		      <p><?php echo $subCatService[107]->art_summary?></p>
		  </li>
		   <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[108]->art_id))?>"><?php echo $subCatService[108]->art_title?></a></h4>
		      <p><?php echo $subCatService[108]->art_summary?></p>
		  </li>
		   <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[109]->art_id))?>"><?php echo $subCatService[109]->art_title?></a></h4>
		      <p><?php echo $subCatService[109]->art_summary?></p>
		  </li>
		   <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[110]->art_id))?>"><?php echo $subCatService[110]->art_title?></a></h4>
		      <p><?php echo $subCatService[110]->art_summary?></p>
		  </li>
		   <li>
			<h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[104]->art_id))?>"><?php echo $subCatService[104]->art_title?></a></h4>
		      <p><?php echo $subCatService[104]->art_summary?></p>
		  </li>
		
<?php
}
?>
		</ul>
</div>