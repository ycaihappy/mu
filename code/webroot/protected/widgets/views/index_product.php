			<div class="hd">			
				<span class="on"><a href="">电子商务</a></span>
			</div>
			<div class="bd">		
				<div class="area-one">
				
					<div class="qk-search">
						<p>
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布供应</a> | 
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/supply')?>">发布求购</a> | 
						<a href="<?php echo $this->getController()->createUrl('/uehome/user/goods')?>">发布现货</a> 
						</p>
						<form>
							<div>
								<span>选择品种</span>
								<?php echo CHtml::dropDownList('bigType', 0, $allBigType,array(
									'ajax'=>array(
					                    'type'=>'GET',
					                    'url'=>CController::createUrl('getChildrenTerms'),
					                    'update'=>'#smallType',
					                    'data'=>array('group_id'=>"14",'parent_id'=>'js:this.value')
					                )
                				))?>
                				<?php echo CHtml::dropDownList('smallType', 0, array(),array('empty'=>'全部'))?>
								<span>存货地</span><?php echo CHtml::dropDownList('province', 0, $allProvince)?>
								<span>生产厂家</span>
								<input name="enterprise" type="text" />
							</div>
							<div>
								<span>厚度\口径</span><input type="text" />~<input type="text" /><span>宽度</span><input type="text" />~<input type="text" /><span>长度</span><input type="text" />
							</div>
							<div class="btn">
								<span>排序</span><select><option>请选择</option></select>
								<button type="submit" class="ui-m-btn btn-purple-medium">搜索</button>
							</div>
						</form>
						<table cellspacing="0" cellpadding="0" width="100%">
							<tr><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td></tr>
							<tr><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td></tr>
							<tr><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td><td>字了</td></tr>
						</table>
						<div class="ui-gallery" id="J_ImgScroller">
							<ul>
								<li><a><img src="images/ma1.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma2.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma1.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma2.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma1.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma2.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma1.jpg" width="116" height="70" /></a></li>
								<li><a><img src="images/ma2.jpg" width="116" height="70" /></a></li>
								
							</ul>
						</div>
					</div>
				
					<div class="cg-area ui-m-border">
						<div class="ui-purple-hd">
								<h6>推荐企业</h6>
						</div>
						<div class="ulist">
							<ul>
	            		<?php for($index=0;$index<count($data);$index++):?>
                               <li><a href="<?php echo Yii::app()->controller->createUrl('/storeFront/default/index',array('username'=>$data[$index]['user']['user_name']));?>"><?php $data[$index]['ent_name'];?></a></li>
				    	<?php endfor;?>			
						</ul>
						</div>
					</div>
				<div class="clearfix"></div>
			</div>
