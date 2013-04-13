<?php #if($this->beginCache('indexSupply')){ ?>
        <div class="m-large-tab ui-m-tab ui-m-border" id="J_New_Tab_List">
			<div class="hd">
				<div class="tab">
					<span class="on"><a href="<?php echo $this->getController()->createUrl('/supply/index')?>">最新供求</a></span>
					<span class="<?php echo $this->getController()->createUrl('/supply/index')?>"><a href="">最新求购</a></span>
				</div>
				<div class="links">
					<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/goods');?>" class="ui-m-btn btn-purple-medium">发布现货</a>
					<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/supply');?>" class="ui-m-btn btn-purple-medium">发布求购</a>
					<a href="<?php echo Yii::app()->controller->createUrl('uehome/user/supply');?>" class="ui-m-btn btn-purple-medium">发布供应</a>
				</div>
					
				
			</div>
			<div class="bd">
				<ul class="on">
                <?php for($index=0;$index<20;$index++):
                    $class = ($index == 0) ? 'class="b"' : '';
                    if (isset($data02[$index]))
                    {
                ?>
                    <li <?php echo $class;?>><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data02[$index]['supply_id']));?>"><?php echo $data02[$index]['supply_name'];?></a><em><?php echo date("m-d",strtotime($data02[$index]['supply_join_date']));?></em></li>
	            <?php }endfor;?>			   
				</ul>
				<ul >
                <?php for($index=0;$index<20;$index++):
                    $class = ($index == 0) ? 'class="b"' : '';
                    if ( isset($data01[$index]))
                    {
                ?>
                    <li <?php echo $class;?>><a href="<?php echo Yii::app()->controller->createUrl('supply/view',array('supply_id'=>$data01[$index]['supply_id']));?>"><?php echo $data01[$index]['supply_name'];?></a><em><?php echo date("m-d",strtotime($data01[$index]['supply_join_date']));?></em></li>
	            <?php }endfor;?>			   
				</ul>
				
			</div>
			<div class="clearfix"></div>
		</div>
<?php #$this->endCache(); } ?>
