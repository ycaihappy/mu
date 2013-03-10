<div class="xh-col-r">
        <!--搜索表单开始-->
        <div class="searchForm">
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td valign="middle" align="center" class="sfHead">
                        快速<br>搜索
                    </td>
                    <td class="headSpan"></td>
                    <td>
                    <form action="<?php echo $this->createUrl('index') ?>" id="search_form" method='post' >
                        <div class="sfInputBox">
                            <label>大类:</label>
							<?php echo CHtml::dropDownList('bigType', $bigType, $allCategory,array(
							'ajax'=>array(
			                    'type'=>'GET',
			                    'url'=>CController::createUrl('getChildrenTerms'),
			                    'update'=>'#smallType',
			                    'data'=>array('group_id'=>"14",'parent_id'=>'js:this.value')
			                )
                			))?>
                            <label>品种:</label>
							<?php echo CHtml::dropDownList('smallType', $smallType, $allSmallType,array('empty'=>'全部'))?>
                            <label>存放地:</label>
							<?php echo CHtml::dropDownList('province', $province, $allProvince,array('empty'=>'全部省份'))?>
                            <label>发布企业：</label><input type="text" value="<?php echo $enterprise?>" id="txt_spec" name="enterprise" />
                        </div>
                        <div class="searchBt">
                            <a id="do_search" href="javascript:$('#search_form').submit();">搜索</a>
                        </div>
                        </form>
                    </td>
                </tr>
            </tbody></table>            
        </div><!--搜索表单结束-->
		<div id="chooseBox" class="chooseBox">
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody><tr>
                    <td valign="middle" align="center" class="headTitle">
                        分<br>
                        步<br>
                        搜<br>
                        索
                    </td>
                    <td class="headspan"></td>
                    <td style="padding: 6px 0 10px 0;">
                        <div class="getParam">
                            <div class="getBox">
                                <div class="dateTitle">大类:</div>
                                <div class="chooseDate">
                                    <dl>
                                        <dd id="sort_List">
                                        <?php 
                                        	
                                        	if($allCategory):
                                        		
                                        		foreach ($allCategory as $key=>$category):
                                        		$categoryUrl=CStringHelper::getExculedUrl(array('bigType','page'),'index').'&bigType='.$key;
                                        ?>
                                            <i><a sid="0" href="<?php echo $categoryUrl?>" class="<?php echo $bigType==$key?'selected':''?>"><?php echo $category?></a></i>
                                        <?php   endforeach;
                                             endif;
                                        ?>
                                        </dd>  
                                    </dl>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="getParam">
                            <div class="getBox">
                                <div class="dateTitle">分类:</div>
                                    <div class="chooseDate">
                                        <dl>
                                            <dd id="nsort_link_list">
                                       <?php if($allSmallType):
                                        		foreach ($allSmallType as $key=>$category):
                                        		$smallTypeUrl=CStringHelper::getExculedUrl(array('smallType','page'),'index').'&smallType='.$key;
                                        ?>
                                            <i><a sid="0" href="<?php echo $smallTypeUrl?>" class="<?php echo $smallType==$key?'selected':''?>"><?php echo $category?></a></i>
                                        <?php   endforeach;
                                             endif;
                                        ?>
                                        </dd>
                                        </dl>  
                                    </div>
                                    <div ct="#nsort_link_list" class="moreOpen"><a title="查看更多选项" href="javascript:">更多</a></div>
                                </div>
                            <div class="clear"></div>
                        </div>
                        <div class="getParam">
                            <div class="getBox">
                                <div class="dateTitle">存放地:</div>
                                    <div class="chooseDate">
                                        <dl>
                                            <dd id="sf_link_list">
                         				<?php if($allProvince):
                                        		foreach ($allProvince as $key=>$city):
                                        		$provinceUrl=CStringHelper::getExculedUrl(array('province','page'),'index').'&province='.$key;
                                        ?>
                                            <i><a sid="0" href="<?php echo $provinceUrl?>" class="<?php echo $province==$key?'selected':''?>"><?php echo $city?></a></i>
                                        <?php   endforeach;
                                             endif;
                                        ?>
                                            </dd>
                                        </dl>  
                                    </div>
                                    <div ct="#sf_link_list" class="moreOpen"><a title="查看更多选项" href="javascript:">更多</a></div>
                                </div>
                            <div class="clear"></div>
                        </div>
                    </td>
                </tr>
            </tbody></table>                                    
        </div>
        <!--搜索列表开始-->
        <div class="searchDateList" id="J_Xh_Slist">
        <div class="search-Date-show">
		<table width="100%">
		
		<tr>
			<th width="220">品名</th>
			<th>品质</th>
			<?php if($smallType==31):?>
			<th>含水量</th>
			<?php endif;?>
			<th width="170">发布企业</th>
			<th>存货地</th>
			<th>价格</th>
			<th>重量</th>
			<th>更新时间</th>
		</tr>
		
		 <?php 
			if($products):
				foreach ($products as $product):?>
				<tr cid="<?php echo $product->product_id?>" class="no-border" style="">
					<td nowrap="true"><a  title="<?php echo $product->product_name?>" href="<?php echo $this->createUrl('view',array('product_id'=>$product->product_id))?>" target="_blank"><?php echo $product->product_name?></a></td>
					<td><?php echo $product->product_mu_content;?></td>
					<?php if($smallType==31):?>
					<td><?php echo $product->product_water_content;?></td>
					<?php endif;?>
					<td><span title="<?php echo $product->user->enterprise?$product->user->enterprise->ent_name:'未指定';?>"><?php echo $product->user->enterprise?$product->user->enterprise->ent_name:'未指定';?></span></td>
					<td><?php echo $product->city?$product->city->city_name:'未指定'?></td>
					<td><?php echo $product->product_price?></td>
					<td><?php echo $product->product_quanity.$product->unit->term_name?></td>
					<td><?php echo date('Y-m-d',strtotime($product->product_join_date))?></td>
				  
				</tr>
				<?php endforeach;
				else:
				?>
				<tr><td colspan="<?php echo $smallType==31 ? 8 : 7;?>">没有你要找的现货信息</td></tr>
				<?php endif;?>
		
		
		
		</table>

              
        </div>
        
            <!--分页-->
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
        <!--搜索列表结束-->
            
    </div>