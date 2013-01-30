			<div class="m-rcm left" id="J_Rcm">
				<div class="hd">
					<span class="on"><a href="">推荐企业</a></span>
					<a class="more">更多</a>
					<div class="clearfix"></div>
				</div>
				<div class="bd">
					<div class="scroll">
					<ul>
			<?php for($index=0;$index<count($data);$index++):
						?>
						<li>
							<div class="img"><img src="images/img1.jpg" width="93" height="68" /></div>							
							<div class="info">
                            <a><?php echo $data[$index]['ent_name'];?></a>
                            <p>1分钟前更新 <span class="red"><?php echo rand(19,200);?>条</span></p>
                                <p><?php echo $data[$index]['ent_business_scope'];?></p>
							</div>
						</li>
					<?php endfor;?>			
					</ul>
					</div>
				</div>
