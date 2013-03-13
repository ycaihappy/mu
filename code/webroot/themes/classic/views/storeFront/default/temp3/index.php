<div id="company">
	<div class="common_box">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" >
		<tr><td class="guide_ba"><span>公司介绍</span></td></tr>
		<tr>
			<td class="com_intro">
				<?php if($img):?>
				<a href="shop.php?uid=<{$smarty.get.uid}>&action=profile&m=company">
				<img src="<?php echo $img?>" style="float:right; width:250px; border:1px solid #CCCCCC;margin-left:10px;">
				</a>
				<?php endif;?>
				<?php echo $content;?>
				<br /><a style="background-image:url(image/en/icon17.gif);background-repeat:no-repeat;background-position:left; padding-left:5px; margin-left:10px;" href="<?php echo Yii::app()->getController()->createUrl('companyProfile',array('username'=>$userName)) ?>">更多</a>
			</td>
		 </tr>
	 </table>
	</div>
</div>
<style>
.rec_pro ul li{ float: left;height: 170px;padding:0px; text-align: center;width: 130px; margin-left:8px;}
.rec_pro ul li img{width:130px;}
</style>

<div class="common_box">
<table width="100%" border="0" cellspacing="0" cellpadding="0" >
	<tr><td align="left" class="guide_ba" colspan="5"><span>最新现货资源</span></td></tr>
	<tr>
		<?php foreach ($productsList as $product):?>
    <tr>
      <td style="border-bottom:1px dashed #CCCCCC" align="left" valign="top">
            <a target="_blank" href="<?php echo Yii::app()->controller->createUrl('/product/view',array('product_id'=>$product->product_id)) ?>" title="<?php echo $product->product_name?>"><b><?php echo $product->product_name?></b></a>
       </td>
        <td style="border-bottom:1px dashed #CCCCCC" align="left" valign="top"><?php echo $product->type->term_name?></td>
        <td style="border-bottom:1px dashed #CCCCCC" align="left" valign="top"><?php echo $product->product_price?>元/<?php echo $product->unit->term_name?></td>
        <td style="border-bottom:1px dashed #CCCCCC" align="left" valign="top"><?php echo $product->product_city_id?></td>
        <td style="border-bottom:1px dashed #CCCCCC" width="120" align="right"><?php echo date('Y-m-d',strtotime($product->product_join_date))?></td>
    </tr>
   <?php endforeach;?>
	</tr>
</table>
</div>
