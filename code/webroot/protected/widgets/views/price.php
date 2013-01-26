			<div class="m-quot">
				<div class="hd">
				<span class="on"><a href="">价格行情</a></span>			
				<a href="" class="more">更多</a>
				</div>
				<div class="bd">
					<div class="col-l">
					<p>
						<select>
							<option>交易所</option>
						</select>
						<select>
							<option>沪铝</option>
						</select>
						<select>
							<option>沪铝连续</option>
						</select>
					</p>
					<div class="chart">
						<img src="images/b.png" />
					</div>
					</div>
					<div class="col-r">
						<ul class="current">
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
			</div>
