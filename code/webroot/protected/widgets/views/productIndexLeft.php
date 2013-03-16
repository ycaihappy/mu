<!--left-->
<div class="xh-col-l">
        <!--发布功能区开始-->
        <div class="sdTop">
            <div class="btBox">
                <ul>
                    <li class="btLf"><a title="免费发布现货资源到资源库" href="<?php echo $this->getController()->createUrl('/uehome/user/goods')?>">发布现货资源</a></li> 
                    <li class="btRg"><a title="钢铁求购信息" href="<?php echo $this->getController()->createUrl('/supply/index')?>">查看求购资源</a></li>
                </ul>
            </div>
        </div><!--发布功能区结束-->
            <style type="text/css">
                .zykDateTab tbody td{ border-bottom:1px solid #CCC; padding:4px 0;_padding:4px 0;*padding:4px 0;cursor:pointer;color:#003333;line-height:16px;}
            </style>
       
        <div id="RightAdList">  
		<div class="ui-m-tab">
		<div class="hd">			
				<span class="on"><a href="">推荐企业</a></span>
			</div>
		</div>
        <?php if($advEnt):
        		foreach ($advEnt as $ent):
        ?>       
        <div class="txtAd">
            <div class="txtadHd">
                <h2><strong><a href="<?php echo $ent->ent_id?>" target="_blank"><?php echo $ent->ent_name?></a></strong></h2>
                <div class="txtadCt">
                    <p><a href="<?php echo $ent->ent_id?>" target="_blank"><?php echo $ent->ent_business_scope?>，电话：<?php echo $ent->user->user_telephone?>，<?php echo $ent->user->user_mobile_no?>  <?php echo $ent->user->user_first_name ?> 地址：<?php echo $ent->ent_location?></a></p>
                    <p><a class="webSite" href="<?php echo $ent->ent_id?>" target="_blank"><?php echo $ent->ent_website?></a></p>
                </div>
            </div>           
        </div>
        <?php endforeach;
        endif;
        ?>
        
</div>
    </div>