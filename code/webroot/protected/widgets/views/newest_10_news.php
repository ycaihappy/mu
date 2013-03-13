<div class="hd">
	<span class="on"><a href="">最新新闻</a></span>	
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