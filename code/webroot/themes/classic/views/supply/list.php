		<div class="grid-690">
<div class="m-suppy-list ui-m-tab ui-m-border">
			
	<div class="hd">
		<span class="on">
			<a href=""><?php echo $title?>信息</a>
		</span>
	</div>
   	 
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="left_table">    
            
                    <tbody><tr>
                      <th>状态</th>
                      <th>品名</th>
                      <th>品阶</th>
                      <th>数量</th>
                      <th>存货地</th>
                      <th>发布日期</th>
                    </tr>
                
             		<?php for($index=0;$index<count($data);$index++):?>
                    <tr>                     
                    <td><font style="color:red;"><?php echo $supply_type[$data[$index]['supply_type']];?></font></td>
                    <td class="td02"><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>"><?php echo $category[$data[$index]['supply_category_id']];?></a></td>
                    <td><?php echo $data[$index]['supply_mu_content'];?></td>
                    <td><?php echo $data[$index]['supply_price'].'/'.($data[$index]->unit?$data[$index]->unit->term_name:'未指定');?></td>
                    <td><?php echo $city[$data[$index]['supply_city_id']];?></td>
                    <td><?php echo date("Y-m-d",strtotime($data[$index]['supply_join_date']));?></td>                      
                    </tr>
	        		<?php endfor;?>			   
                

        </tbody></table>
	  	<div class="page" id="fenye">

			<?php 
	            $this->widget('CLinkPager',array(
							'header'=>'',
							'firstPageLabel'=>'首页',
							'lastPageLabel'=>'末页',
							'prevPageLabel'=>'上一页',
							'nextPageLabel'=>'下一页',
							'pages'=>$pager,
							'maxButtonCount'=>6,
							)
				
				);
            ?>		
			
			</div>
</div>
</div>
<div class="grid-260">
		
		
        <!--module start-->
            <?php $this->widget('SupplyIndexSpecialWidget');?>
		<!--module end-->
		<!--module start-->
		<div class="m-gc-ad">
		<?php if($adv):?>
		<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
		
		<img width="260" height="85" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>"></a>
		<?php endif;?>
		</div>
		<!--module end-->
		
		<!--module start-->
            <?php $this->widget('SupplyEnterpriseWidget');?>
		<!--module end-->
        </div>

