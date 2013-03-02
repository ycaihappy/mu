<h4 class="h501">
<a href="" class="red">本网视点</a>
<a target="_blank" href="<?php echo $viewpointOne->art_source?>"><?php echo $viewpointOne->art_title?></a></h4>
    
<ul>
<?php 
if ($viewpoint):
	foreach ($viewpoint as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?> 
</ul>