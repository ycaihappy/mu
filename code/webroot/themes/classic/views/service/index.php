		<div class="ad"><img src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>" width="700" height="211" /></div>
		<div class="service-hd ui-m-border">
			<span></span>
		</div>
		<table width="700" cellspacing="0" cellpadding="0" border="0" class="servicesListTable ui-m-border">
  			<tbody>
<?php if ( isset($subCatService[105]) && isset($subCatService[106]) && isset($subCatService[104])
&& isset($subCatService[107]) && isset($subCatService[108]) && isset($subCatService[109]) )
{
?>
		  <tr>
		    <td width="100"><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td width="250"><h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[105]->art_id))?>"><?php echo $subCatService[105]->art_title?></a></h4>
		      <p><?php echo $subCatService[105]->art_summary?></p></td>
		    <td width="100"><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td width="250"><h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[106]->art_id))?>"><?php echo $subCatService[106]->art_title?></a></h4>
		      <p><?php echo $subCatService[106]->art_summary?></p></td>
		  </tr>
		  
		  <tr>
		    <td><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td><h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[107]->art_id))?>"><?php echo $subCatService[107]->art_title?></a></h4>
		      <p><?php echo $subCatService[107]->art_summary?></p></td>
		    <td><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td><h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[108]->art_id))?>"><?php echo $subCatService[108]->art_title?></a></h4>
		      <p><?php echo $subCatService[108]->art_summary?></p></td>
		  </tr>
		  <tr>
		    <td><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td> <h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[109]->art_id))?>"><?php echo $subCatService[109]->art_title?></a></h4>
		      <p><?php echo $subCatService[109]->art_summary?></p></td>
		    <td><img width="79" height="82" src="/images/services_05.jpg"></td>
		    <td><h4><a href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[110]->art_id))?>"><?php echo $subCatService[110]->art_title?></a></h4>
		<p><?php echo $subCatService[110]->art_summary?></p></td>
		  </tr>
		  <tr>
		    <td width="102"><img width="86" height="75" src="/images/servicesBG_02.jpg"></td>
		    <td width="242"><h4><a target="_blank" href="<?php echo $this->createUrl('/service/view',array('art_id'=>$subCatService[104]->art_id))?>"><?php echo $subCatService[104]->art_title?></a></h4>
		      <p><?php echo $subCatService[104]->art_summary?></p></td>
		  </tr>
<?php
}
?>
		</tbody>
</table>
