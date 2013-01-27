            <div class="m-nous right">
				<div class="hd">
				<span class="on"><a href="">钼常识</a></span>			
				<a href="" class="more">更多</a>
				</div>
				<div class="bd">
					<ul>
			<?php for($index=0;$index<count($data);$index++):
							if($index==0):
						?>
							<li class="b"><a href=""><?php echo $data[$index]['art_title'] ?></a></li>
							<?php else :?>
							<li><a href="" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
							<?php endif;?>
					<?php endfor;?>			
					</ul>
				</div>
			</div>
