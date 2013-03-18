<div class="topnews">
   <h4><a target="_blank" href="<?php echo $headNews->art_source ?>"><?php echo $headNews->art_title?></a></h4>
   <p>
	<?php echo $headNews->art_content;?>
	</p>
</div>

<div class="news ui-m-tab ui-m-border">
<div class="hd">
	<span class="on">主推新闻</span>
</div>
<div class="bd">
<h4>
<a target="_blank" href="<?php echo $topOne->art_source?>"><?php echo $topOne->art_title?></a>
</h4>

<ul>
<?php 
if ($top4News):
 foreach ($top4News as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?> 
</ul>
</div>
</div>