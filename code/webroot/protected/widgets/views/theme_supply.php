<div class="m-suppy-list ui-m-tab ui-m-border">
			
	<div class="hd">
		<span class="on">
			<a href="">供应信息</a>
		</span>
	</div>
   	 
        <table cellspacing="0" cellpadding="0" border="0" width="100%" class="left_table" style="margin-bottom:0">    
            
                    <tbody><tr>
                      <th>状态</th>
                      <th>品名</th>
                      <th>品阶</th>
                      <th>数量</th>
                      <th>存货地</th>
                      <th>发布日期</th>
                    </tr>
					<tr>
					<td colspan="6" style="padding:0">
             		<div class="supply-scroll" id="J_ImgScroller_1" data-type="vertical">
					
					<ul>
<?php
if ( !empty($data) )
{
    foreach ($data as $supply_one)
    {
?>
	<li>
        <span class="col-1"><font style="color:red;"><?php echo $supply_type[$supply_one->supply_type];?></font></span>
        <span class="col-2"><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$supply_one->supply_id));?>" target="_blank"><?php echo $category[$supply_one['supply_category_id']];?></a></span>
        <span class="col-3"><?php echo $supply_one->supply_mu_content;?></span>
        <span class="col-4"><?php echo $supply_one->supply_price;?>/吨</span>
        <span class="col-5"><?php echo $city[$supply_one->supply_city_id];?></span>
        <span class="col-6"><?php echo date("Y-m-d",strtotime($supply_one->supply_join_date));?></span>
	</li>
<?php
    }
}
?>
					</ul>
					</div>
					</td>
					</tr>
        </tbody></table>
</div>
