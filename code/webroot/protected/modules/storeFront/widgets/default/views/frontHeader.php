<div id="name">
	<table width="965" border="0" cellspacing="0" cellpadding="0">
	  <tr>
		<td width="220" height="100" align="center" valign="middle">
		 <?php if($logo):?><img src="<?php echo $logo?>" align="middle" /><?php endif;?>
		 </td>
		<td width="745" align="left" valign="middle" class="company_name"><h1><?php echo $company->ent_name; ?></h1><?php echo $company->ent_business_scope?></td>
	  </tr>
	</table>
</div>
<div id="nav">
    <?php foreach ($menu as $list):?>
        <?php if($list['menu_show']=='1'):?>
        	<?php if($list['menu_link']!=''):?>
            	<a <?php if($list['menu_link']==$action):?>class="now" <?php endif;?> href="<?php echo $list['menu_link'] ?>"><?php echo $list['menu_name']?></a>
            <?php else :?>
            	<a href="<?php echo $list['menu_link'] ?>"><?php echo $list['menu_name']?></a>
            <?php endif;?>
        <?php endif;?>    
    <?php endforeach;?>
</div>