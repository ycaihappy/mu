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
							<?php echo CHtml::dropDownList('province', $province, $allProvince)?>
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
                                <div class="dateTitle">品名:</div>
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
                        <div style="border-bottom:none;" class="getParam">
                            <div class="getBox">
                                <div class="dateTitle">规格:</div>
                                <div class="chooseDate">
                                    <dl>
                                        <dd id="gg_link_list">
                         				<?php if($allMuContent):
                                        		foreach ($allMuContent as $key=>$content):
                                        		$muContentUrl=CStringHelper::getExculedUrl(array('muContent','page'),'index').'&muContent='.$key;
                                        ?>
                                            <i><a sid="0" href="<?php echo $muContentUrl?>" class="<?php echo $muContent==$key?'selected':'';?>"><?php echo $content?></a></i>
                                        <?php   endforeach;
                                             endif;
                                        ?>
                                        </dd>
                                    </dl>
                                </div>
                                <div ct="#gg_link_list" class="moreOpen"><a title="查看更多选项" href="javascript:" id="gg_lookMore">更多</a></div>
                            </div>
                            <div class="clear"></div>
                            <div style="display:none;" id="pgbar_gg" class="ggpgbar">
                                <div id="nextPage_size"></div>
                                <div id="prevPage_size"></div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody></table>                                    
        </div>
        <!--搜索列表开始-->
        <div class="searchDateList" id="J_Xh_Slist">
        <div class="search-Date-show">
        		<div class="sds-top">
        			<h4>
        				<span class="sds-size-0">品名</span>
        				<span class="sds-size-2">品质</span>
        				<?php if($smallType==31):?>
        				<span class="sds-size-2">含水量</span>
        				<?php endif;?>
        				<span class="sds-size-1">发布企业</span>
        				<span class="sds-size-4">存货地</span>
        				<span class="sds-size-6">价格</span>
        				<span class="sds-size-7">重量</span>
        				<span class="sds-size-8">更新时间</span>
        			</h4>
                    <div class="clear"></div>
        		</div>
                <div class="sds-center">
                    <ul id="data_container" class="sds-date-list">
                    <?php 
                    if($products):
                    	foreach ($products as $product):?>
                        <li cid="<?php echo $product->product_id?>" class="no-border" style="">
					        <span class="sds-size-0"><a  title="<?php echo $product->product_name?>" href="<?php echo $this->createUrl('view',array('product_id'=>$product->product_id))?>" target="_blank"><?php echo $product->product_name?></a></span>
					        <span class="sds-size-2"><?php echo $product->muContent->term_name;?></span>
					        <?php if($smallType==31):?>
					        <span class="sds-size-2"><?php echo $product->waterContent->term_name;?></span>
					        <?php endif;?>
					        <span class="sds-size-1"><span title="<?php echo $product->user->enterprise->ent_name?>"><?php echo $product->user->enterprise->ent_name?></span></span>
					        <span class="sds-size-4"><?php echo $product->city->city_name?></span>
					        <span class="sds-size-6"><?php echo $product->product_price?></span>
					        <span class="sds-size-7"><?php echo $product->product_quanity.$product->unit->term_name?></span>
					        <span class="sds-size-8"><?php echo date('Y-m-d',strtotime($product->product_join_date))?></span>
					       <div class="clear"></div>
					    </li>
					    <?php endforeach;
					    else:
					    ?>
					    <div class="clear">没有你要找的现货信息</div>
					    <?php endif;?>
</ul>
                </div>
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