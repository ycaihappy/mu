 <div class="ui-m-tab ui-m-border">
<div class="hd ui-tab-3">
	<span class="on"><a href="">期货</a></span>	
	<a class="more" href="<?php echo $this->getController()->createUrl('/news/list',array('subcategory_id'=>154))?>">更多</a>
</div>
<div class="bd">
	<ul class="current">
		<li class="b"><a href="<?php echo $newest10One->art_source?>"><?php echo $newest10One->art_title?></a></li>	
	<?php 
		if ($newest10News):
		 foreach ($newest10News as $news):?>
		 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
		<?php endforeach;
		endif;
	?> 
	</ul>
				
</div>
</div>