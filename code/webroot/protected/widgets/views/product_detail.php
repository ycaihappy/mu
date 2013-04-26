	<div class="m-detail" id="J_Prd_Detail">
    <div class="sellinfo clearfix">
        <div class="fl">
            <div class="img">
            <span><img src="<?php echo '/images/commonProductsImages/'.$product_detail['product_image_src'];?>"></span>
             
            </div>

        </div>
        <div class="fr">
        <h1><?php echo $product_detail['product_name'];?></h1>
            
        <p>产品价格：<span class="orange"><?php echo $product_detail['product_price']."元";?></span></p>
        <p>数量：<span><?php echo $product_detail['product_quanity'];?></span><?php echo $product_detail->unit->term_name?></p>
          <p>有效期：<span></span><?php echo ($product_detail['product_status'] == 1) ? "有效" : "无效";?></p>
            <p>
            钼货交割地：<?php echo $product_detail['product_location'];?></p>
            <p>
            添加日期：<span><?php echo date("Y-m-d H:i:s",strtotime($product_detail['product_join_date']));?></span></p>
 
            <p class="btn">
            <a title="立即询价" class="btn_lx" href="<?php echo Yii::app()->controller->createUrl('/storeFront/default/mail',array('username'=>$ent_info['user_name']));?>">立即询价</a><a title="点击收藏" class="btn_sc" href="javascript:;">点击收藏</a></p>
            <div class="vipinfo">
              <!--  <ul>
                    <li class="btn"><a title="查看联系电话" class="btn_phone" href="#">查看联系电话</a>
                        <ul style="display: none;" class="allinfo">
                            <li>联系人：<span>安广虎</span>()</li>
                            <li><a title="加为商友" class="btn_xp" href="javascript:addFriend(517145)">加为商友</a><a title="在线QQ" class="qqonline" href="http://wpa.qq.com/msgrd?V=1&amp;Site=中国建材网&amp;Uin=2510906890&amp;Menu=yes"><img align="absmiddle" src="http://meta.bmlink.com/2012/images/trade/icon_qq.jpg"></a></li>
                            <li>联系电话：<span class="orange">13502153395&nbsp;&nbsp;86-022-60909034</span></li>
                            <li>拨打电话时您可以说：您好，我在中国建材网看到您发布的……</li>
                        </ul>
                    </li>
                </ul>-->
            </div>
<!--<p class="btn"><a title="加入收藏" href="javascript:addCollect(3983588,1,1,406856,'%2f%ef%bf%a5%25%e2%80%94%e3%80%9016mn%e6%96%b9%e9%92%a2%e2%80%94%e2%80%94%e3%80%90%e7%99%be%e5%8d%8e%e3%80%91%e2%80%94%e2%80%9465mn%e6%96%b9%e9%92%a2-20%23%e6%96%b9%e9%92%a2');">加入收藏</a></p>-->
 
        </div>
    </div>
	<div class="ui-m-tab2 ui-m-border">
    <div class="hd">
        <span class="on">详细描述</span>
    </div>
	<div class="bd">
		<div class="proInfo">
			<table width="97%">
				<tr>
					<td>吨度:<?php echo $product_detail['product_mu_content'];?></td><td>含水量:<?php echo $product_detail['product_water_content'];?></td>
				</tr>
				<tr>
					<td>地址:<?php echo $city[$product_detail['product_city_id']];?></td>
					<td>关键字:<?php echo $product_detail['product_keyword'];?></td>
				</tr>
			</table>
		</div>
		<div class="info">
		
        <p><?php echo $product_detail['product_content'];?></p>
		</div>
		
	   
	</div>
	</div>
