			<div class="m-nous">
				<div class="hd">
				<span class="on"><a href="">钼百科</a></span>			
				<a href="" class="more">更多</a>
				</div>
				<div class="bd">
				
					<dl class="aside">
						<dt><span><b>生产工艺</b></span></dt>
						<dd style="height:140px;">
                        <ul class="list" style="display: block;">
   			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']))?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                        </ul>
						</dd>
					</dl>
					<dl class="aside">
						<dt><span><b>钼的用途</b></span></dt>
						<dd style="height:140px;">
                        <ul class="list"  style="display: block;">
   			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']))?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                        </ul>
						</dd>
					</dl>
					<dl class="aside">
						<dt><span><b>国内标准</b></span></dt>
						<dd style="height:140px;">
                        <ul class="list"  style="display: block;">
   			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']))?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                        </ul>
						</dd>
					</dl>
					<dl class="aside">
						<dt><span><b>国际标准</b></span></dt>
						<dd style="height:140px;">
                        <ul class="list"  style="display: block;">
   			<?php for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']))?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;?>			
                        </ul>
						</dd>
					</dl>
					
				</div>
			</div>

