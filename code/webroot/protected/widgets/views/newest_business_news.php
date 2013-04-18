<div class="ui-m-tab ui-m-border">
		<div class="hd ui-tab-3">
				<span class="on"><a href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">财经</a></span>
                  <a class="more" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>43))?>">更多</a>
        </div>
	<div class="bd">
	<!--<h3 class="bigsize">
	<a href="<?php //echo $businessOne->art_source?>"><?php //echo $businessOne->art_title?></a>
	</h3>-->
	<ul class="mod-list main-list">
		<?php 
		if (@$businessNews):
		 foreach ($businessNews as $news):?>
		 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
		<?php endforeach;
		endif;
		?> 
	</ul>
	 </div>
</div>