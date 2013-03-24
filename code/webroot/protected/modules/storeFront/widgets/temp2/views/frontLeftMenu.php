
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
