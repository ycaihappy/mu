	<div class="m-jxs ui-m-tab ui-m-border">
	 <div class="hd">
		<span class="on"><a  href="#">推荐经销商</a></span>
 
	</div>
				
              
                <div class="jxs-con">
                    <div>
                        <ul>
        <?php if($advEnt):
        		foreach ($advEnt as $ent):
        ?>       
        <li><a target="_blank" href="<?php echo $ent->ent_id;?>"><?php echo $ent->ent_name;?></a></li>
        <?php endforeach;
        endif;
?>
						</ul>
                        <div class="clear">
                        </div>
                    </div>
                </div>
 </div>
