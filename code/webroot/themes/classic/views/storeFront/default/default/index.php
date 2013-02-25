<div id="company">
	<div class="common_box">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr><td class="guide_ba"><span>公司介绍</span></td></tr>
		<tr>
			<td class="com_intro">
				<?php if($img):?>
				<a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company">
				<img src="<?php echo $img?>" style="float:right; width:250px; border:1px solid #CCCCCC;margin-left:10px;">
				</a>
				<?php endif;?>
				<?php echo $content;?>
				<br /><a style="background-image:url(image/en/icon17.gif);background-repeat:no-repeat;background-position:left; padding-left:5px; margin-left:10px;" href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company">Read more</a>
			</td>
		 </tr>
	 </table>
	</div>
</div>
<style>
.rec_pro ul li{ float: left;height: 170px;padding:0px; text-align: center;width: 130px; margin-left:8px;}
.rec_pro ul li img{width:130px;}
</style>

<div class="common_box">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr><td class="guide_ba"><span>推荐产品</span></td></tr>
	<tr>
		<td class="rec_pro">
			<ul>   
			<?php foreach ($rec_pro as $list):?>
					<?php if($list['title']):?>
					<li>
					<?php if($list['pic']):?>
						<img src="uploadfile/product/<{$list.pic}>"  alt="<?php echo $list['title']?>" />
					<?php else:?>
						<img src="images/storeFront/default/nopic.gif"  alt="<?php echo $list['title']?>" />
					<?php endif;?><br />
					<a target="_blank" href="<{$config.weburl}>/?m=offer&s=offer_detail&id=<{$list.id}>"><?php echo $list['title']?></a></li>
					<?php endif;?>
				<?php endforeach;?>	
			</ul>						
		</td>
	</tr>
</table>
</div>
