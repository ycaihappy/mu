<h4 class="h501">

<a target="_blank" href="<?php echo $viewpointOne->art_source?>"><?php echo $viewpointOne->art_title?></a></h4>
<p>
    &#12288;钼精矿市场：今日40-45%钼精矿主流报价1540-1570元/吨度附近，47%及以上品位1560-1580元/吨度，价格暂时持稳，行...    </p>
    
<ul>
<?php 
if ($viewpoint):
	foreach ($viewpoint as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?> 
</ul>