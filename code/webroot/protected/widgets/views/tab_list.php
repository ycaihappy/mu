<?php 
if ( $type == 'news')
{
$class = 'middle';
$title = '新闻';
$key = 'art_title';
}
elseif ( $type == 'supply')
{
$class = 'middle';
$title = '供求';
$key = 'supply_content';
}
elseif ( $type == 'special')
{
$class = 'left';
$title = '特价';
}
else 
{
$class = 'right';
$title = '现货';
}
?>
    <div class="m-tab-list <?php echo $class;?>">
			
			<div class="hd">
            <span class="on"><a href=""><?php echo $title;?></a></span>
				<!--<span><a href="">资讯</a></span> -->
				<a href="" class="more">更多</a>
			</div>
			<div class="bd">
				<ul class="current">
			<?php for($index=0;$index<count($data);$index++):
							if($index==0):
						?>
							<li class="b"><a href=""><?php echo $data[$index][$key] ?></a></li>
							<?php else :?>
							<li><a href="" target="_blank"><?php echo $data[$index][$key] ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
				</ul>
				<ul>
					<li class="b"><a href="">xxxxxxxxxxxxxxxxxxxx</a></li>
					<li><a href="" target="_blank">女子裸身泡温泉被偷窥女子裸身泡温泉被偷窥</a></li>
					<li><a href="" target="_blank">女子裸身泡温泉被偷窥女子裸身泡温泉被偷窥</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
					<li><a href="" target="_blank">沈阳地震主播淡定沈阳地震主播淡定</a></li>
			
				</ul>
			</div>
		
		</div>
