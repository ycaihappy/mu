<?php
switch ($type)
{
case 1:
    $title = '推荐新闻';
    break;
case 2:
    $title = '行内新闻';
    $data = $mu_news;
    break;
}
?>
        <div class="m-rcm-list">
			
			<dl class="last">
            <dt><strong><?php echo $title;?></strong></dt>
			  <dd>				
				<ul>
			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
				</ul>
			  </dd>
			</dl>
		</div>
