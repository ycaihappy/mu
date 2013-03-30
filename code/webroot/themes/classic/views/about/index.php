<table border="0" class="contactStyle">
  <tbody>
  <tr>
    <td width="410" rowspan="2"><img width="410" height="400" src="images/mapBJ.gif"></td>
    <td width="280"><h3><?php echo $this->siteConfig->companyName?> </h3>
  <p>地址：<?php echo $this->siteConfig->location?></p> 
  <p>邮编：<?php echo $this->siteConfig->zipcode?></p> 
  <p>传真：<?php echo $this->siteConfig->fax?></p>
  <p>全国咨询热线：<?php echo $this->siteConfig->advisoryHotline?></p>
  </td>
  </tr>
  <tr>
    <td><h3>客服热线：</h3>
      <?php echo $this->siteConfig->csHotline2?>
      <h3>客服邮箱：</h3>
      <p><?php echo $this->siteConfig->csEmail?></p>
      <h3>销售热线</h3>
      <p><?php echo $this->siteConfig->sellHotline?></p>
      <h3>QQ:</h3>
      <p><?php echo $this->siteConfig->qq?></p>
      <h3>MSN:</h3>
      <p><?php echo $this->siteConfig->siteMsgNum?></p>
    </td>
  </tr>
  </tbody>
</table>
