<div class="common_box">	
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
  <tr align="left">
    <td class="guide_ba"><strong>新闻详情</strong></td>
  </tr>
  <tr>
    <td align="left" valign="top" style="height:auto">
		<div style="text-align:center; font-size:16px; font-weight:bold"><?php echo $model->art_title?></div>
		<div style="text-align:center; padding:5px;">
			发布时间:<?php echo date('Y-m-d',strtotime($model->art_added_date))?>&nbsp;浏览数:<?php echo $model->art_click_count?>
		</div>
		<div class="news_conaa" style="border-top:1px solid #CCCCCC;">
			<?php echo $model->art_content?>
		</div>
    </td>
  </tr>
</table>
</div>