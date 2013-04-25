		 <div class="ui-m-tab ui-m-border">
<div class="hd"><span class="on"><a href="#"><?php echo $title;?>价格汇总</a></span></div>
               
                <div class="bd">
                     <ul class="mod-list main-list">
   		<?php
$i = 0;
foreach ($data as $art_one)
{
    if ( $i>8) continue;
?>
    <li><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$art_one->art_id));?>"><?php echo $art_one->art_title;?></a></li>
<?php
    $i++;
}
?>			                          
								
                     </ul>
                    
                </div>
        </div>
