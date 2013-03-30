
        <div class="m-rcm-list ui-m-tab ui-m-border">
			<div class="hd">
				<span class="on"><?php echo $title;?></span>
			</div>
			<dl class="last">           
			  <dd>				
				<ul>
			<?php
					if($data):
						for($index=0;$index<count($data);$index++):
						?>
                            <li><a href="<?php echo Yii::app()->controller->createUrl('news/view',array('art_id'=>$data[$index]['art_id']));?>" target="_blank"><?php echo $data[$index]['art_title'] ?></a></li>
					<?php endfor;
					endif;
					?>			
				</ul>
			  </dd>
			</dl>
		</div>
