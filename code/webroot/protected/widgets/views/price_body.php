<?php
$class = ($type == 1) ? '1' : '2';
$data  = ($type == 1) ? $data01: $data02;

$hq_name = ($type == 1) ? '原料行情' : '价格汇总';
if ( $type == 1)
    $hq_sub_name = '<a href="#">钼精矿</a>｜<a href="#">钼铁</a>｜<a href="#">三氧化钼</a>｜<a href="#">钼酸铵</a>｜<a href="#">钼棒</a>｜<a href="#">钼靶</a>';
else
    $hq_sub_name = '<a href="#">栾川</a>｜<a href="#">黑龙江</a>｜<a href="#">沈阳</a>';
$hq_sub_name = '';
?>
<div class="m-hq-box ui-m-tab ui-m-border" id="J_Hq_Box_<?php echo $class;?>">
                
				<div class="hd">
					<span class="on"><?php echo $hq_name;?></span>
				</div>
				
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
                           		<?php for($index=0;$index<count($data02)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data02[$index]['art_title'] ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a></li>
			<?php endfor;?>			

                            </ul>
                            <ul id="bcMzpsInfo" style="">
                           		<?php for($index=0;$index<count($data02)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
                            </ul>
                        </div>
                    </div>
           </div>
      <div class="clearfix"></div>

</div>

