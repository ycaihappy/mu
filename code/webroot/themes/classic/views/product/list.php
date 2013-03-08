		<div class="grid-690">
<div class="m-suppy-list">
			

   	  <h2 class="art_gyxx"><span class="on"><a href="">特价产品</a><i></i></span></h2>
        <table width="100%" cellspacing="0" cellpadding="0" border="0" class="left_table">    
            
                    <tbody><tr>
                      <th>品类</th>
                      <th>现货名称</th>
                      <th>品阶</th>
                      <th>含水量</th>
                      <th>价格</th>
                      <th>存货地</th>
                      <th>发布日期</th>
                    </tr>
                
             		<?php for($index=0;$index<count($data);$index++):?>
                    <tr>                     
                    <td><font style="color:red;"><?php echo $data[$index]->type->term_name;?></font></td>
                    <td class="td02"><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('product/view',array('product_id'=>$data[$index]['product_id']));?>"><?php echo $data[$index]['product_name'];?></a></td>
                    <td><?php echo $data[$index]->muContent->term_name;?></td>
                    <td><?php echo $watercontent[$data[$index]['product_water_content']];?></td>
                    <td><?php echo $data[$index]->product_price.'/'.$data[$index]->unit->term_name;?></td>
                    <td><?php echo $data[$index]->city->city_name;?></td>
                    <td><?php echo date("Y-m-d",strtotime($data[$index]['product_join_date']));?></td>                      
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
            <?php $this->widget('SupplyEnterpriseWidget',array('type'=>1));?>
		<!--module end-->
		<!--module start-->
		<div class="m-gc-ad"><a target="_blank" href="http://xh.steelcn.com/new.aspx"><img width="260" height="85" src="images/xinahuotong_288_85.png"></a></div>
		<!--module end-->
		
		<!--module start-->
            <?php $this->widget('SupplyEnterpriseWidget');?>
		<!--module end-->
        </div>

