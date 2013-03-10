    <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">现货中心</span></div></td>
    <td width="881" class="line2">
        <ul>
<?php 
foreach ($category as $category_id =>$category_name)
{
    if ( $category_id == 0 ) continue;
?>
    <li> <a target="_blank" href="<?php echo Yii::app()->controller->createUrl('product/index',array('bigType'=>$category_id));?>"><?php echo $category_name;?></a></li>
<?php
}
?>
        </ul>
    </td>
  </tr>
   <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">新闻中心</span></div></td>
    <td width="881" class="line2">
        <ul>
   			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>41))?>">社会热点</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>40))?>">本网视点</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>47))?>">区域新闻</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>42))?>">行业动态</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>35))?>">国内新闻</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>34))?>">国际新闻</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>48))?>">分析评论</a></li>
			<li><a href="<?php echo Yii::app()->controller->createUrl('list',array('subcategory_id'=>49))?>">网站动态</a></li>
        </ul>
    </td>
  </tr>
   <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">行情中心</span></div></td>
    <td width="881" class="line2">
        <ul>
                <li> <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>58));?>">当日报价</a></li>
		        <li><a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>59));?>">价格汇总</a></li>
		        <li><a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>37));?>">国际行情</a></li>
		        <li><a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>36));?>">国内行情</a></li>
		        <li> <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>60));?>">市场评论</a></li>
		        <li> <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>61));?>">分析预测</a></li>
				<li> <a href="<?php echo Yii::app()->controller->createUrl('price/list',array('subcategory_id'=>62));?>">钼走势</a></li>
        </ul>
    </td>
  </tr>
   <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">供求中心</span></div></td>
    <td width="881" class="line2">
        <ul>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>1))?>" title="供应">供应</a></li>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>2))?>" title="求购">求购</a></li>
        </ul>
    </td>
  </tr>
   <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">钼百科</span></div></td>
    <td width="881" class="line2">
        <ul>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>1))?>" title="供应">生产工艺</a></li>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>2))?>" title="求购">国内标准</a></li>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>2))?>" title="求购">国际标准</a></li>
        </ul>
    </td>
  </tr>
   <tr>
    <td width="109" valign="middle" align="left" class="line1"><div class="tab2"><span class="tab2font">服务中心</span></div></td>
    <td width="881" class="line2">
        <ul>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>1))?>" title="供应">抵押</a></li>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>2))?>" title="求购">贷款</a></li>
                    <li><a href="<?php echo Yii::app()->controller->createUrl('/supply/list',array('type'=>2))?>" title="求购">担保</a></li>
        </ul>
    </td>
  </tr>
