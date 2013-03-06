		<div class="m-supplier-detail" id="contentInfo">
            <div class="msg_time">
                <span></span>发布于 2013/1/28 11:41:01
            </div>
            <div id="com_info" class="cmp_info">
            	<ul>
                	<li>
                    	<span>供应</span>
                        <em><?php echo $supply['supply_content'];?></em>
                   	</li>
                	<li>
                    	<span>发布公司</span>
                        <em><?php echo $user_info['enterprise']['ent_name'];?></em>
                   	</li>
                    <li>
                    	<span>联系人</span>
                        <em><?php echo $user_info['enterprise']['ent_chief'];?></em>
                        <!--<a href="http://i.steelcn.com/member/contacto/contactoAdd.aspx?user=xidingmaoyi" class="ci_mail" target="_blank">站内信</a>-->
                    </li>
                    <li class="ci_li01">
                    	<span>品种</span>
<?php echo $category[$supply['supply_category_id']];?>

                    </li>
                    <li class="ci_li">
                    	<span>品位</span>
<?php echo $supply['supply_mu_content'];?> 
                    </li>
                    <li class="ci_li">
                    	<span>含水量</span>
<?php echo $supply['supply_water_content'];?>
                    </li>
                    <li class="ci_li">
                    	<span>交货地</span>
<?php echo $city[$supply['supply_city_id']];?>
                    </li>
                    <li class="ci_li">
                    	<span>关键字</span>
<?php echo $supply['supply_keyword'];?>
                    </li>
                    <li class="ci_li">
                    	<span>联系电话</span>
                        <em><?php echo $supply['supply_phone'];?></em>
                    </li>
                    <li class="ci_li">
                    	<span>价格</span>
<?php echo $supply['supply_price'];?>
                    </li>
                </ul>
            </div>
           
            <div class="am_note">
                现货
            </div>
            <p class="art_note">·联系我时，请注明您是在钼市网上看到了我的采购信息</p>
      </div>
