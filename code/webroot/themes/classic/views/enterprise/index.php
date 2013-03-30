	<div class="layout-area">
		<div class="m-ad">
			<?php if($adv):?>
			<a target="_blank" href="<?php echo $adv[0]->ad_link?>">
				<img width="960" height="60" src="<?php echo '/images/advertisement/'.$adv[0]->ad_media_src?>">
			</a>
			<?php endif;?>
        </div>	
				
	</div>
	<div class="layout-area gird-960">
		<div class="m-filter" id="J_Filter">
			<div class="hd">
				<span>当前过滤条件：</span>
				<?php if($selectParams):
					foreach ($selectParams as $key=>$params):
					$excUrl=CStringHelper::getExculedUrl(array($key,'page'),'index');
				?>
				<a href="<?php echo $excUrl ?>"><?php echo $params['name'] ?><i></i></a>
				<?php endforeach;
				$cleanUrl=CStringHelper::getExculedUrl(array('bus_model','ent_city','user_type','page'),'index');
				?>
				<a class="delall" href="<?php echo $cleanUrl?>">清除全部</a>
				<?php endif;?>
			</div>
			<div class="bd">
				<div class="tag-items">
				<?php 
					$countModel=count($allBusModel);
					if($countModel>8):
				?>
					<a class="toggle collapse" href="javascript:;"></a>
					<?php endif;?>
					<dl>
					<dt  title="类别">类别:</dt>				
					<dd>
						<div class="tag-list">
						<?php if ($allBusModel):
						$i=0;
						foreach ($allBusModel as $key=>$name):
							$class=@$businessModel==$key?'class="on"':'';
							$entTypeUrl=CStringHelper::getExculedUrl(array('bus_model','page'),'index').'&bus_model='.$key;
							if($i>7):
						?>
						</div>
						<div class="more" style="display: none;"> 
						<?php endif;?>
						<a <?php echo $class?> href="<?php echo $entTypeUrl?>" title="<?php echo $name ?>"><?php echo $name ?></a>
						<?php 
							$i++;
							endforeach;
						endif;
						?>
						</div>	
					</dd>
					</dl>
				</div>
				<div class="tag-items">
				<?php 
					$countProvince=count($allProvince);
					if($countProvince>8):
				?>
					<a class="toggle collapse" href="javascript:;"></a>
					<?php endif;?>
					<dl>
					<dt  title="所在地区">所在地区:</dt>				
					<dd>
						<div class="tag-list">
						<?php if ($allProvince):
						$i=0;
						foreach ($allProvince as $key=>$name):
							$class=@$entCity==$key?'class="on"':'';
							$entProvinceUrl=CStringHelper::getExculedUrl(array('ent_city','page'),'index').'&ent_city='.$key;
							if($i>7):
						?>
						</div>
						<div class="more" style="display: none;"> 
						<?php endif;?>
						<a <?php echo $class?> href="<?php echo $entProvinceUrl?>" title="<?php echo $name ?>"><?php echo $name ?></a>
						<?php 
							$i++;
							endforeach;
						endif;
						?>
						</div>	
					</dd>
					</dl>
				</div>
				<div class="tag-items last">
				<?php 
					$countUserType=count($allUserType);
					if($countUserType>8):
				?>
					<a class="toggle collapse" href="javascript:;"></a>
					<?php endif;?>
					<dl>
					<dt  title="会员类型">会员类型:</dt>				
					<dd>
						<div class="tag-list">
						<?php if ($allUserType):
						$i=0;
						foreach ($allUserType as $key=>$name):
							$class=@$userType==$key?'class="on"':'';
							$userTypeUrl=CStringHelper::getExculedUrl(array('user_type','page'),'index').'&user_type='.$key;
							if($i>7):
						?>
						</div>
						<div class="more" style="display: none;"> 
						<?php endif;?>
						<a <?php echo $class?> href="<?php echo $userTypeUrl?>" title="<?php echo $name ?>"><?php echo $name ?></a>
						<?php 
							$i++;
							endforeach;
						endif;
						?>
						</div>	
					</dd>
					</dl>
				</div>
			</div>
		</div>
	</div>
	
<div class="layout-area gird-960">
	<div class="m-ep-list ui-m-tab ui-m-border">
		<div class="hd ">
			<span class="on"><a>企业列表</a></span>
		</div>
		<div class="bd">
			<div class="sub-title">
				<div class="l">供应信息/公司</div>
				<div class="r">会员等级</div>
			</div>
			<ul>
				<?php 
				if($enterprises):
					foreach ($enterprises as $enterprise):
				?>
				<li>
					<div class="img-info">
						<a href="<?php echo $this->createUrl('/storeFront/default/index',array('username'=>$enterprise->user->user_name))?>"><img src="<?php echo $enterprise->ent_logo?'/'.$enterprise->ent_logo:'/images/nologo.gif'?>" width="120" height="120" /></a>
					</div>
					<div class="info">
						<strong><a href="<?php echo $this->createUrl('/storeFront/default/index',array('username'=>$enterprise->user->user_name))?>" target="_blank"><?php echo $enterprise->ent_name?></a></strong>
						<p>
							<?php echo $enterprise->ent_introduce?>
						</p>
					</div>
					<div class="sub">
						<div class="split"></div>
						<p style="margin:5px 0px;"><span style="font-weight:bold">主营：</span><?php echo $enterprise->ent_business_scope?></p>
						<p style="margin:5px 0px;"><span style="font-weight:bold">类型：</span><?php echo $enterprise->business?$enterprise->business->term_name:'未指定'?></p>
						<p style="margin:5px 0px;"><span style="font-weight:bold">地址：</span><?php echo $enterprise->ent_location?></p>
					</div>
					<div class="btn-area">
						<img src="<?php echo '/images/mushw/'.$enterprise->user->type->group_logo?>" width="32" height="32" />
						
						<a href="<?php echo $this->createUrl('/storeFront/default/mail',array('username'=>$enterprise->user->user_name))?>" target="_blank" class="btn-qjly"></a>
						<a href="<?php echo $this->createUrl('/storeFront/default/mail',array('username'=>$enterprise->user->user_name))?>" target="_blank"  class="btn-lxsj"></a>
					</div>
				</li>
				<?php endforeach;
				else:
				?>
				<li><div class="info">抱歉！没有符合条件的企业信息。</div></li>
				<?php 
				endif;
				?>
				
			</ul>
		</div>
		<div class="ft">
			<div id="fenye" class="page">
		<?php 
	            $this->widget('CLinkPager',array(
							'header'=>'',
							'firstPageLabel'=>'首页',
							'lastPageLabel'=>'末页',
							'prevPageLabel'=>'上一页',
							'nextPageLabel'=>'下一页',
							'pages'=>$page,
							'maxButtonCount'=>6,
							)
				
				);
            ?>           
       </div>
		</div>
	</div>
	<!--right start-->
	<?php $this->widget("EnterpriseListRecWidget");?>
	<!--right end-->
	</div>
	