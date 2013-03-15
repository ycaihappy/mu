<!--qq online-->
<div id="J_QQBox" class="QQbox">
	<div class="Qlist">
	<div class="t"></div>
	<div class="infobox"><?php echo $companyName?></div>
	<div class="con">
		<ul>
		<?php if($onlines):
				foreach ($onlines as $online):
		?>
			<li class="odd"><a target="_blank" href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo $online->online_num?>&amp;Site=<?php echo $companyName?>&amp;Menu=yes"><img border="0" alt="<?php echo $companyName?>" src=" http://wpa.qq.com/pa?p=1:<?php echo $online->online_num?>:4">&nbsp;<?php echo $online->online_name?></a></li>
			<?php endforeach;
			endif;
			?>
		</ul>
		</div>
		<div class="b"></div>
		</div>
	<div class="qqdiv"></div>
</div>
<!--qq online-->
