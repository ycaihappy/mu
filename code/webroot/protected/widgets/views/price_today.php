		<div class="m-jrbj">
            <h1>
                <a href="#">今日报价</a></h1>
            
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
<?php foreach ($data as $key=>$price_value){?>
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
        
<?php }?>

        
    </tbody></table>
 

        </div>
