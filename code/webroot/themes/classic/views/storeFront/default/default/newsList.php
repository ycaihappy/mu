<div class="common_box">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left" class="guide_ba" colspan="3"><span>公司新闻</span></td>
    </tr>
    <?php foreach ($artList as $art):?>
    <tr>
      <td style="border-bottom:1px dashed #CCCCCC" align="left" valign="top">
            <a target="_blank" href="<?php echo Yii::app()->controller->createUrl('newDetail',array('art_id'=>$art->art_id)) ?>" title="<?php echo $art->art_title?>"><b><?php echo $art->art_title?>:</b></a>
        	<span><?php echo $art->art_intro?></span>
        </td>
        <td style="border-bottom:1px dashed #CCCCCC" width="120" align="right"> <?php echo date('Y-m-d',strtotime($art->art_added_date))?></td>
    </tr>
   <?php endforeach;?>
    <tr>
        <td colspan="2" class="pager">
        <?php

			$this->widget('CLinkPager',array(
						'header'=>'',
						'firstPageLabel'=>'首页',
						'lastPageLabel'=>'末页',
						'prevPageLabel'=>'上一页',
						'nextPageLabel'=>'下一页',
						'pages'=>$pager,
						'maxButtonCount'=>13,
						)
			
			);
	?></td>
    </tr>  
</table>
</div>