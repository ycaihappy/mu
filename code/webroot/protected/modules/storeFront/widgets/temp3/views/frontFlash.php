<?php if($flash):?>
<object width="980" height="250" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000">
<param value="/images/storeFront/default/hot_new.swf" name="movie">
<param value="high" name="quality"><param value="false" name="menu">
<param value="opaque" name="wmode">
<param value="bcastr_file=<?php echo $flash ?>&bcastr_link=&bcastr_title=" name="FlashVars">
<embed width="980" height="250" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" quality="high" false="" flashvars="bcastr_file=<?php echo $flash ?>&bcastr_link=&bcastr_title=&menu=" wmode="opaque" src="images/storeFront/default/hot_new.swf"></object>
<?php else:?>
<img src="<?php echo $imgurl?>grey_banner.jpg"/>
<?php endif;?>
