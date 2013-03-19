		<div class="m-link ui-m-border">
			<div class="hd">
				<span>友情链接</span>
				<div class="link-list">
				<?php if($siteLinks):
						foreach ($siteLinks as $link):
				?>
					<a href="<?php echo $link->flink_url?>"><?php echo $link->flink_name?></a> | 
					<?php endforeach;
					endif;
					?>
				</div>
			</div>
		</div>
