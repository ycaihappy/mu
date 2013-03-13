
<style>
.rec_pro ul li{ float: left;height: 170px;padding:0px; text-align: center;width: 130px; margin-left:8px;}
.rec_pro ul li img{width:130px;}
</style>
<style>
.authenticate td{ border-bottom:1px dashed #CCCCCC;}
.STYLE1 {color: #999999}
</style>
<div class="common_box">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" >
    <tr>
      <td class="guide_ba"><span>公司介绍 </span> </td>
    </tr>
    <tr>
      <td class="com_intro">
        <?php if($img):?> <img src="<?php echo $img?>" style="float:right; width:250px; border:1px solid #CCCCCC;margin-left:10px;"> <?php endif;?>
        <?php echo $content?>
 
      </td>
    </tr>
    <tr>
      <td class="guide_ba"><span>详细资料</span> </td>
    </tr>
    <tr>
    	<td class="com_intro">
    	 <table style="margin-top:30px;" width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="20%"><span class="STYLE1">企业类型：</span></td>
            <td width="30%"><?php echo $company->type->term_name?></td>
            <td width="20%"><span class="STYLE1">经营模式：</span></td>
            <td width="30%"><?php if (!empty($company->business)) echo $company->business->term_name?></td>
          </tr>
          <tr>
           <td><span class="STYLE1">注册资本：</span></td>
            <td><?php echo $company->ent_registered_capital?>万元</td>
            <td><span class="STYLE1">主营范围：</span></td>
            <td><?php echo $company->ent_business_scope?></td>
          </tr>
        </table>
    	</td>
    </tr>
    <?php if($authenticate):?>
     <tr>
      <td class="guide_ba"><span>工商认证信息 </span> </td>
    </tr>
    <tr></td>
    <td><
    </tr>
        <tr>
      <td class="com_intro"><{if $smarty.get.authenticate==1}>
        <table width="100%" border="0" cellspacing="0" cellpadding="0" class="authenticate">
          <tr>
            <td width="15%"><{$lang.com_reg_name}></td>
            <td width="*"><{$authenticate.com_reg_name }> </td>
            <td width="300" rowspan="11" style="padding:5px;"><img style="border:1px solid #CCCCCC;" src="<{$authenticate.pic}>"></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_id}></td>
            <td><{$authenticate.com_reg_id }></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_add}> </td>
            <td><{if $authenticate.com_reg_add_protect==1}><{$lang.statu_protect}><{else}><{$authenticate.com_reg_add }><{/if}></td>
          </tr>
          <tr>
            <td><{$lang.com_deputy}> </td>
            <td><{if $authenticate.com_deputy_protect==1}><{$lang.statu_protect}><{else}><{$authenticate.com_deputy }><{/if}></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_capital}> </td>
            <td><{if $authenticate.com_reg_capital_protect==1}><{$lang.statu_protect}><{else}><{$authenticate.com_reg_capital }><{/if}></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_type}> </td>
            <td><{$authenticate.com_reg_type}></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_time}></td>
            <td><{$authenticate.com_reg_time }></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_time_ex}></td>
            <td><{$authenticate.com_reg_time_ex }></td>
          </tr>
          <tr>
            <td><{$lang.com_reg_area}> </td>
            <td><{$authenticate.com_reg_area}> </td>
          </tr>
          <tr>
            <td><{$lang.com_reg_unit}> </td>
            <td><{$authenticate.com_reg_unit}> </td>
          </tr>
          <tr>
            <td><{$lang.com_check}> </td>
            <td><{$authenticate.com_check}> </td>
          </tr>
        </table>
        </td>
        </tr>
        <?php endif;?>
  </table>
</div>
