<div class="common_box">
<table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left" class="guide_ba" colspan="5"><span>现货资源</span></td>
    </tr>
    <tr>
    <th>名称</th>
    <th>品类</th>
    <th>单价</th>
    <th>存货地</th>
    <th>发布时间</th>
    </tr>
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
    <tr>
        <td colspan="5" class="pager">
        <?php

			$this->widget('CLinkPager',array(
						'header'=>'',
						'firstPageLabel'=>'首页',
						'lastPageLabel'=>'末页',
						'prevPageLabel'=>'上一页',
						'nextPageLabel'=>'下一页',
						'pages'=>$pager,
						'maxButtonCount'=>13,
						)
			
			);
	?></td>
    </tr>  
</table>
</div>