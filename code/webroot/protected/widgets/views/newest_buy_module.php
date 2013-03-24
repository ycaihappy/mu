<div class="m-qgxx ui-m-tab ui-m-border" id="J_Qgxx">
	<div class="hd ui-tab-105">
		<span class="on">最新求购信息</span>
		<a class="more" href="<?php echo $this->getController()->createUrl('supply/list',array('type'=>2))?>">更多</a>
	</div>
            <div class="qgxx_main">
                <div id="nihao" class="halftransp"></div>
            	<dl id="jq_animate_loop" style="padding-top: 0px;">
	            	<?php if($data):
	            			foreach ($data as $buy):
	            	?>
            		<div>
                                <dt id="gy_txt_39774" class="qg_txt"><?php echo $buy->supply_name?>，品类：<?php echo $buy->category->term_name?> ， 品质：<?php echo $buy->supply_mu_content?>，联系人：<?php echo $buy->supply_contractor?>，电话：<?php echo $buy->supply_phone?>，提货地：<?php echo $buy->city->city_name?></dt>
                                <dd>
                                	<div data="type=tools" id="bdshare_js"></div>
                                    <a class="is_V" href="<?php echo $this->getController()->createUrl('supply/view',array('supply_id'=>$buy->supply_id))?>"><?php echo $buy->user->enterprise->ent_name?></a> 发表于 <?php echo date('Y/m/d',strtotime($buy->supply_join_date))?>
                                </dd>
                	</div>
                	<?php endforeach;
                		endif;
                	?>
    
                </dl>
            </div>
</div>
