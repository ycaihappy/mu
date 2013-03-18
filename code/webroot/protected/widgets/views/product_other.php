<?php
$image_coin = ($data['enterprise']['ent_recommend'] == 1) ? 'golden.gif' : 'silver.gif';
?>
<div class="m-refinfo">
	
			<div class="ui-m-tab ui-m-border">
			  <div class="hd"><span class="on">会员信息</span></div>
			  <div class="bd">
				<h6><?php echo $data['enterprise']['ent_name'];?></h6>				
				<div class="info">
                <img src="images/<?php echo $image_coin;?>" style="float:left;margin-right:10px;"/>
                    <p style="float:left;line-height:20px;width:60%">类型：
<?php echo  $business_model[$data['enterprise']['ent_business_model']];?><br />
                    所在地：(<?php echo $citylist[$data['enterprise']['ent_city']];?>)
					</p>
			   </div>
			  </div>
			</div>
			<div class="ui-m-tab ui-m-border">
			<div class="hd"><span class="on">企业介绍</span></div>	
          
			  <div class="bd">				
<?php echo $data['enterprise']['ent_introduce'];?>
			  </div>
			</div>
			<div class="lxxx ui-m-tab ui-m-border">
			<div class="hd"><span class="on">联系信息</span></div>	

			  <div class="bd">
				<span class="kf"><img src="images/kf.jpg" /></span>
				<ul>
                <li>联 系 人:<?php echo $data['enterprise']['ent_chief'];?></li>
                <li>联系电话:<?php echo $data['user_telephone'];?></li>
                <li>手机:<?php echo $data['user_mobile_no'];?></li>
				  <li> QQ在线:<a rel="nofollow" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2510906890&amp;site=qq&amp;menu=yes" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:2510906890:41 &amp;r=0.35315199465694036"></a></li>
                  <li>传    真:<?php echo $data['enterprise']['ent_tax'];?></li>
                  <li>地   址:<?php echo $data['enterprise']['ent_location'];?></li>
				</ul>
			  </div>
			</div>

		</div>
