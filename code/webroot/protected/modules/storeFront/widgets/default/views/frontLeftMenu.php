
        <div class="item"><span>联系我们</span></div>
        <div id="mPro" class="exp">
            <ul>
				<li><span>公司名称</span>：<?php echo $company->ent_name?></li>
				<li><span>联系电话</span>：<?php echo $user->user_telephone?></li>
				<li><span>联系人</span>：<?php echo $user->user_first_name."({$user->user_sex})"?></li>
				<li><span>手机</span>：<?php echo $user->user_mobile_no?></li>
				<li><span>电话</span>：<?php echo $user->user_telephone?></li>
				<li><span>网址</span>：<?php echo $company->ent_website?></li>
				<li><span>地址</span>：<?php echo $company->ent_location?></li>
				<li><span>邮箱</span>：<?php echo $user->user_email?></li>
				<li><span>传真</span>：<?php echo $company->ent_tax?></li>
            </ul>
        </div>
		
        <!--  <div class="item"><span>及时通讯</span></div>
         <div id="mPro" class="exp">
			 <ul>
				<li><a title="企业评级" href="#">图标 金牌会员( 1 年)</a></li>
				<li>
				<a href="shop.php?uid=5&action=mail">联系 平顶山钼铁集团</a>
				<a href="<{$config.weburl}>/main.php?m=message&s=admin_friends&friendid=<{$com.userid}>">添加为商友</a></li>
				
				<li><a title="qq号码" target="blank" href="tencent://message/?uin=623774807&Site=<{$config.company}>&Menu=yes" >
				Q Q：<img src='http://is.qq.com/webpresence/images/status/10_online.gif' border="0"></a>
				</li>
				
				<li><a href="msnim:chat?contact=xiaofuqian@live.cn">MSN:xiaofuqian@live.cn</a></li>
				<li><a href="">KYPE:xiaofuqian@live.cn</a></li>
			 </ul>
         </div>-->
         
         <div class="item"><span>友情链接</span></div>
         <div id="mPro" class="exp">
             <ul>
             	
                <?php
				if($ulink):
                foreach ($ulink as $list):?>
                	<li><a href="<?php echo  $list->flink_url?>" target="_blank"><?php echo $list->flink_name?></a></li>
                <?php endforeach;endif;?>
             </ul>
         </div>