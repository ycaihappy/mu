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
                    <td><font style="color:red;"><?php echo $data[$index]['supply_type'];?></font></td>
                    <td class="td02"><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data[$index]['supply_id']));?>"><?php echo $data[$index]['supply_category_id'];?></a></td>
                    <td><?php echo $data[$index]['supply_unit'];?></td>
                    <td><?php echo $data[$index]['supply_price'];?></td>
                    <td><?php echo $data[$index]['supply_city_id'];?></td>
                    <td><?php echo $data[$index]['supply_join_date'];?></td>                      
                    </tr>
	        		<?php endfor;?>			   
                
        </tbody></table>
	  	<div class="page" id="fenye">

		<a href="javascript:void(0);">&lt;上一页</a>
		<a class="page_cur">1</a>
		<a href="?p=2">2</a>
		<a href="?p=3">3</a>
		<a href="?p=4">4</a>
		<a>…</a>
		<a title="下一页" href="?p=2">下一页&gt;</a>
		<a title="尾页" href="?p=827">尾页</a></div>

			
			</div>
