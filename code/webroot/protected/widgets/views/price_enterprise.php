	<div class="m-jxs">
                <h1>
                    <a class="bt" href="javascript:;">推荐经销商</a></h1>
                <div class="jxs-con">
                    <div>
                        <ul>
			<?php for($index=0;$index<count($data);$index++):?>
                            <li><a target="_blank" href="<?php echo Yii::app()->controller->createUrl('/storeFront/default/index',array('username'=>$data[$index]['user']['user_name']));?>"><?php echo $data[$index]['ent_name'];?></a></li>
					<?php endfor;?>			
						</ul>
                        <div class="clear">
                        </div>
                    </div>
                </div>
            </div>
