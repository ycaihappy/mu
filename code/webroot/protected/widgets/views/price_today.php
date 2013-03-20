		<div class="m-jrbj ui-m-tab ui-m-border">
		  <div class="hd">
				<span class="on">今日报价</span>
 
		</div>
         <div class="bd">
            
    <table width="93%" cellspacing="0" cellpadding="0" style=" line-height:29px;">
        
        <tbody><tr>
            <th align="left">
                品名/价格
            </th>
            
<?php foreach($area as $key => $value){?>
            <th>
<?php echo $city[$key];?>
            </th>
<?php }?>
            </tr>
<?php 
$i=0;
foreach ($data as $key=>$price_value){
    if ( $i>6) continue;
    ?>
        <tr>
            <td style="text-align: left; width: 28%">
<?php echo $category[$key];?>
            </td>
<?php foreach ($price_value as $one_value){?> 
            <td>
<?php echo $one_value;?>
            </td>
                <?php }?> 

            </tr>
        
<?php $i++;}?>

        
    </tbody></table>
 
 </div>
</div>
