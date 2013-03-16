		<div class="m-link">
			<div class="hd">
				<span>友情链接</span>欢迎同行交换友情链接,请联系QQ:12307700
				<div class="clearfix"></div>
				<div class="link-list">
				<?php if($siteLinks):
						foreach ($siteLinks as $link):
				?>
					<a href="<?php echo $link->flink_url?>"><?php echo $link->flink_name?></a>
					<?php endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
