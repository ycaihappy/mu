		<div class="m-refinfo">

			<dl>
            <dt><strong><?php echo $data['enterprise']['ent_name'];?></strong></dt>
			  <dd>				
<?php echo $data['enterprise']['ent_introduce'];?>
			  </dd>
			</dl>
			<dl>
			  <dt><strong>联系信息</strong></dt>
			  <dd>				
				<ul>
                <li>联 系 人:<?php echo $data['enterprise']['ent_chief'];?></li>
                <li>联系电话:<?php echo $data['user_telephone'];?></li>
                <li>手机:<?php echo $data['user_mobile_no'];?></li>
				  <li> QQ在线:<a rel="nofollow" href="http://wpa.qq.com/msgrd?v=3&amp;uin=2510906890&amp;site=qq&amp;menu=yes" target="_blank"><img border="0" src="http://wpa.qq.com/pa?p=2:2510906890:41 &amp;r=0.35315199465694036"></a></li>
                  <li>传    真:<?php echo $data['enterprise']['ent_tax'];?></li>
                  <li>地   址:<?php echo $data['enterprise']['ent_location'];?></li>
				</ul>
			  </dd>
			</dl>

		</div>
