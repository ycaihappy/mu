<?php
$class = ($type == 1) ? '1' : '2';

$hq_name = ($type == 1) ? '原料行情' : '地区行情';
if ( $type == 1)
    $hq_sub_name = '<a href="#">钼精矿</a>｜<a href="#">钼铁</a>｜<a href="#">三氧化钼</a>｜<a href="#">钼酸铵</a>｜<a href="#">钼棒</a>｜<a href="#">钼靶</a>';
else
    $hq_sub_name = '<a href="#">栾川</a>｜<a href="#">黑龙江</a>｜<a href="#">沈阳</a>';

?>
<div class="m-hq-box" id="J_Hq_Box_<?php echo $class;?>">
                <h1><a class="bt" href="#"><?php echo $hq_name;?></a><span class="fb"><?php echo $hq_sub_name;?></span></h1>
                <div class="hq-con">
                    <div class="jg">
                       <!-- <h2> 钼价格</h2> -->
                        <ul>
                            
			<?php for($index=0;$index<count($data);$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;?>			

                        </ul>
                    </div>
                    <div class="fp">
                        <h2>
                            <a class="" href="">每日分析</a><a href="" class="on">每周评述</a><!--<a href="">价格汇总</a>--></h2>
                        <div class="fp-con">
                            <ul id="bcMrfxInfo" style="display: none;">
                           		<?php for($index=0;$index<count($mu_news)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($mu_news[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[$index]['art_id']));?>" title="<?php echo $mu_news[$index]['art_title'] ?>" target="_blank"><?php echo $mu_news[$index]['art_title']; ?></a></li>
			<?php endfor;?>			

                            </ul>
                            <ul id="bcMzpsInfo" style="">
                           		<?php for($index=0;$index<count($data)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
                            </ul>
                            <ul id="bcBchzInfo" style="display: none;">
                                <li><span>02-25</span><a target="_blank" title="2月25日国内主要城市中厚板价格汇总" href="priceInfo.aspx?id=12650">2月25日国内主要城市中厚板价格汇总</a></li><li><span>02-25</span><a target="_blank" title="2月25日国内主要城市涂镀价格汇总" href="priceInfo.aspx?id=12651">2月25日国内主要城市涂镀价格汇总</a></li><li><span>02-25</span><a target="_blank" title="2月25日国内主要城市热轧板卷价格汇总" href="priceInfo.aspx?id=12652">2月25日国内主要城市热轧板卷价格汇总</a></li><li><span>02-25</span><a target="_blank" title="2月25日国内主要城市冷轧板卷价格汇总" href="priceInfo.aspx?id=12654">2月25日国内主要城市冷轧板卷价格汇总</a></li><li><span>02-25</span><a target="_blank" title="2月25日国内主要城市热轧带钢价格汇总" href="priceInfo.aspx?id=12656">2月25日国内主要城市热轧带钢价格汇总</a></li><li><span>02-22</span><a target="_blank" title="2月22日国内主要城市中厚板价格汇总" href="priceInfo.aspx?id=12632">2月22日国内主要城市中厚板价格汇总</a></li>
                            </ul>
                        </div>
                    </div>
           </div>
      <div class="clearfix"></div>

</div>

