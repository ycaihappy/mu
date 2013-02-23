<div id="company">
	<div class="common_box">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr><td class="guide_ba"><span><{$lang.company}></span></td></tr>
		<tr>
			<td class="com_intro">
				<{if $com.img!=""}>
				<a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company">
				<img src="<{$com.img}>" style="float:right; width:250px; border:1px solid #CCCCCC;margin-left:10px;">
				</a>
				<{/if}>
				<{$com.intro|strip_tags|truncate:1100}>...    
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
	<tr><td class="guide_ba"><span><{$lang.rec_pro}></span></td></tr>
	<tr>
		<td class="rec_pro">
			<ul>      
				<{foreach item=list from=$rec_pro}>
					<{if $list.title!=''}>
					<li>
					<{if $list.pic }>
						<img src="uploadfile/product/<{$list.pic}>"  alt="<{$list.title}>" />
					<{else}>
						<img src="image/default/nopic.gif"  alt="<{$list.title}>" />
					<{/if}><br />
					<a target="_blank" href="<{$config.weburl}>/?m=offer&s=offer_detail&id=<{$list.id}>"><{$list.title|truncate:35}></a></li>
					<{/if}>
				<{/foreach}>		
			</ul>						
		</td>
	</tr>
</table>
</div>
