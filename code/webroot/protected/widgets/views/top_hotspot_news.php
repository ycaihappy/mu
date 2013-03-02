<h5>
    <a href="" class="red">热点新闻</a>
    <a target="_blank" href="<?php echo $hotspotOne->art_source?>"><?php echo $hotspotOne->art_title?></a></h5>
    <p>
    <?php echo $hotspotOne->art_content;?>
    </p>
    
<ul>
<?php 
if ($hotspot):
 foreach ($hotspot as $news):?>
 <li><a target="_blank" href="<?php echo $news->art_source?>"><?php echo $news->art_title?></a></li>
<?php endforeach;
endif;
?>        
</ul>