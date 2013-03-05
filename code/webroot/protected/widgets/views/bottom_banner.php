		<div class="m-brand">
		<?php if($bottom_banners):
				foreach ($bottom_banners as  $banner):
		?>
			<a href="<?php echo $banner->ad_link?>"><img src="<?php echo $banner->ad_media_src?>" /></a>
			<?php endforeach;
			endif;
			?>
	</div>
