            <div class="m-case middle">
				<div class="hd">
				<span class="on"><a href="">成功案例</a></span>			
				<a href="" class="more">更多</a>
				</div>
				<div class="bd">
					<ul>
						<?php for($index=0;$index<count($data);$index++):
                         $ent = Enterprise::model()->findByPk($data[$index]['purchase_user_id']);

							if($index==0):
						?>
							<li class="b"><a href=""><?php echo  $ent->ent_name." 购买了 ".$data[$index]['purchase_amount']; ?></a></li>
							<?php else :?>
							<li><a href="" target="_blank"><?php echo " 购买了 ".$data[$index]['purchase_amount']; ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
					
					</ul>
				</div>
			</div>
