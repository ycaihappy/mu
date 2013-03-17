		<div class="m-supplier-detail">
			<div class="ui-m-tab">
            <div class="hd ui-m-border">
            <span class="on">供求产品信息</span><em>发布于 <?php echo date("Y/m/d H:i:s", strtotime($supply['supply_join_date']));?></em>
            </div>
            <div class="bd ui-m-border">
            	<ul>
                	<li>
                    	<span>供应</span>
                        <em><?php echo $supply['supply_name'];?></em>
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
                    <li>
                    	<span>品位</span>
<?php echo $supply['supply_mu_content'];?> 
                    </li>
                    <li>
                    	<span>含水量</span>
<?php echo $supply['supply_water_content'];?>
                    </li>
                    <li>
                    	<span>交货地</span>
<?php echo $city[$supply['supply_city_id']];?>
                    </li>
                    <li>
                    	<span>关键字</span>
<?php echo $supply['supply_keyword'];?>
                    </li>
                    <li>
                    	<span>联系电话</span>
                        <em><?php echo $supply['supply_phone'];?></em>
                    </li>
                    <li>
                    	<span>价格</span>
<?php echo $supply['supply_price'];?>
                    </li>
                </ul>
            </div>
			</div>			
			<div class="ui-m-tab2">
				<div class="hd ui-m-border"><span class="on">产品说明</span><span>联系我们</span></div>
				<div class="bd ui-m-border">
					<ul class="content">
<?php echo $supply['supply_content'];?>
					</ul>
					<ul class="content hide">
						内容内容内容内容11
					</ul>
				</div>
				<div class="ft">
					<div class="ui-m-warn">
						<i class="ico-warn"></i><strong>免责声明</strong><span>此信息由第三方企业自行发布，内容的真实性、准确性请用户自行核实，如产生任何纠纷本网不承担责任。</span>
					</div>
				</div>
			</div>
			
      </div>
