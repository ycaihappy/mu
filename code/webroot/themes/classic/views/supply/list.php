		<div class="grid-690">
<div class="m-suppy-list">
			

   	  <h2 class="art_gyxx"><span class="on"><a href="">供应信息</a><i></i></span></h2>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="left_table">    
            
                    <tbody><tr>
                      <th>状态</th>
                      <th>品名</th>
                      <th>规格</th>
                      <th>数量</th>
                      <th>存货地</th>
                      <th>发布日期</th>
                    </tr>
                
             		<?php for($index=0;$index<count($data);$index++):?>
                    <tr>                     
                    <td><font style="color:red;"><?php echo $supply_type[$data[$index]['supply_type']];?></font></td>
                    <td class="td02"><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>"><?php echo $category[$data[$index]['supply_category_id']];?></a></td>
                    <td><?php echo $data[$index]['supply_unit'];?></td>
                    <td><?php echo $data[$index]['supply_price'];?></td>
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
							'maxButtonCount'=>7,
							)
				
				);
            ?>		
			
			</div>
</div>
</div>
<div class="grid-260">
		
		
        <!--module start-->
            <?php $this->widget('SupplySpecialWidget');?>
		<!--module end-->
		<!--module start-->
		<div class="m-gc-ad"><a target="_blank" href="http://xh.steelcn.com/new.aspx"><img width="260" height="85" src="images/xinahuotong_288_85.png"></a></div>
		<!--module end-->
		
		<!--module start-->
            <?php $this->widget('SupplySpecialWidget');?>
		<!--module end-->
        </div>

