	<div class="m-jxs">
                <h1>
                    <a class="bt" href="javascript:;">推荐经销商</a></h1>
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
