<?php
$class = ($type == 1) ? '1' : '2';
$data  = ($type == 1) ? $data01: $data02;

$hq_name = ($type == 1) ? '原料行情' : '价格汇总';

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
					<?php
						if ($class == 2) :
                            $type_arr = array(57,31);
                            $type = $type_arr[array_rand($type_arr)];
					?>
					<div class="chart" data-api="<?php echo Yii::app()->controller->createUrl('price/chart',array('type'=>$type,'year'=>date("Y"),'to_year'=>date("Y"),'month'=>date("n"),'to_month'=>date("n"),'day'=>date("d")));?>">
						<div class="chart-info"></div>
					</div>
					<?php else:?>
                        <h2>
                            <a class="" href="">每日分析</a><a href="" class="on">每周评述</a><!--<a href="">价格汇总</a>--></h2>
                        <div class="fp-con">
                            <ul style="display: none;">
                           		<?php for($index=0;$index<count($data02)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data02[$index]['art_title'] ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a></li>
			<?php endfor;?>			

                            </ul>
                            <ul style="">
                           		<?php for($index=0;$index<count($data02)-1;$index++):?>
        <li><span><?php echo date("m-d",strtotime($data02[$index]['art_post_date']));?></span><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data02[$index]['art_id']));?>" title="<?php echo $data[$index]['art_title'] ?>" target="_blank"><?php echo $data02[$index]['art_title']; ?></a></li>
			<?php endfor;?>			
                            </ul>							
                        </div>
						<?php endif;?>
                    </div>
           </div>
      <div class="clearfix"></div>

</div>

