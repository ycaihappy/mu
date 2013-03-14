		<div class="m-qk-login">
			<div class="bd">
				<form name="qklogin" action="<?php echo $this->getController()->createUrl('/uehome/user/ajaxLogin')?>">
				<ul>
					<li><label>用户名：</label><div class="fields"><input type="text" name="UserForm[username]" /></div></li>
					<li><label>密码：</label><div class="fields"><input type="password" name="UserForm[password]"  /></div></li>
					<li><div class="btn"><input type="submit" name="submit" value="登 录" class="btn-red" /></div></li>
					
				</ul>
				</form>
			</div>
			<div class="ft">
				<div class="line"></div>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>651))?>" class="btn-purple">仓储金融</a>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>653))?>" class="btn-purple">动产质押</a>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>652))?>" class="btn-purple">仓单质押</a>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>655))?>" class="btn-purple">配送</a>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>656))?>" class="btn-purple">前置现货通</a>
				<a href="<?php echo $this->getController()->createUrl('/service/view',array('art_id'=>657))?>" class="btn-purple">质检</a>

			</div>
		</div>
