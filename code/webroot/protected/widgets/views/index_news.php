<?php  # if($this->beginCache('indexNews')){ ?>       
        <div class="m-new-hx" id="J_New_Tab_List">
			<div class="hd">
				<span class="on"><a href="">今日行情</a></span>
				<span class=""><a href="">行情分析</a></span>
				<div class="clearfix"></div>
			</div>
			<div class="bd">
				<ul class="on">
<?php for($index=0;$index<8;$index++):
if (isset($data[$index]))
{
?>
    <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo CStringHelper::truncate_utf8_string($data[$index]['art_title'],14) ?></a><em><?php echo date("m-d",strtotime($data[$index]['art_post_date']));?></em></li>
                    <?php } endfor;?>			
				</ul>
				<ul>
<?php for($index=0;$index<8;$index++):
if (isset($mu_news[$index]))
{
        ?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$mu_news[$index]['art_id']));?>" target="_blank"><?php echo CStringHelper::truncate_utf8_string($mu_news[$index]['art_title'],14) ?></a><em><?php echo date("m-d",strtotime($mu_news[$index]['art_post_date']));?></em></li>
                    <?php }endfor;?>			
				</ul>
			</div>
		</div>
<?php #$this->endCache(); } ?>
