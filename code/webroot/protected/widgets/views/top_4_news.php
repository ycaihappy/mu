<div class="topnews">
   <h4><a target="_blank" href="<?php echo $headNews->art_source ?>"><?php echo $headNews->art_title?></a></h4>
   <p>
	<?php echo $headNews->art_content;?>
	</p>
</div>
<ul>
<?php 
if ($top4News):
 foreach ($top4News as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?>        
</ul>

