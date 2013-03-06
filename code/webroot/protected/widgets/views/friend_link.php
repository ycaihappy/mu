		<div class="m-link">
			<div class="hd">
				<span>友情链接</span>
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
