<{if $smarty.get.m=='company'}>
        <div class="item"><span><{$lang.cominfo}></span></div>
        <div id="mPro" class="exp">
            <ul>
				<li><a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company&type=1"><{$lang.cominfo}></a></li>
				<{foreach item=list key=num from=$custom_pages}>
					<li><a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company&type=<{$num}>"><{$list}></a></li>
				<{/foreach}>
				<li><a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company&authenticate=1"><{$lang.business}></a></li>
				<li><a href="shop.php?uid=<{$smarty.get.uid}>&action=comments&m=company"><{$lang.urew}></a></li>
            </ul>
        </div>
        <{/if}>
		
		<{if $custom_cat.0.name}>
        <div class="item"><span><{$lang.pro_index}></span></div>
        <div id="mPro" class="exp">
            <ul>
            	<{foreach item=list from=$custom_cat}>
                	<li><a href="shop.php?uid=<{$smarty.get.uid}>&action=offer_list&m=offer&cat=<{$list.id}>" title="<{$list.name}>"><{$list.name}>(<{$list.count}>)</a></li>
                <{/foreach}> 
            </ul>
        </div>
        <{/if}>
		
        <div class="item"><span><{$lang.jslx}></span></div>
         <div id="mPro" class="exp">
			 <ul>
				<li><a title="<{$com.rank}>" href="#"><{$com.medal}><{$com.group_name}>(<{$com.time_long}><{$lang.year}>)</a></li>
				<li>
				<a href="shop.php?uid=<{$com.userid}>&action=mail"><{$lang.contact}><{$com.name}></a>
				<a href="<{$config.weburl}>/main.php?m=message&s=admin_friends&friendid=<{$com.userid}>"><{$lang.addtomyfriend}></a></li>
				<{if $com.qq}>
				<li><a title="<{$com.qq}>" target="blank" href="tencent://message/?uin=<{$com.qq}>&Site=<{$config.company}>&Menu=yes" >
				Q Q：<img src='http://is.qq.com/webpresence/images/status/10_online.gif' border="0"></a>
				</li>
				<{/if}>
				<li><a href="msnim:chat?contact=<{$com.msn}>">MSN:<{$com.msn}></a></li>
				<li><a href="">KYPE:<{$com.skype}></a></li>
			 </ul>
         </div>
         
         <div class="item"><span><{$lang.com_link}></span></div>
         <div id="mPro" class="exp">
             <ul>
                <{foreach item=list from=$ulink}>
                	<li><a href="<{$list.link_url}>" target="_blank"><{$list.link_name}></a></li>
                <{/foreach}>
             </ul>
         </div>