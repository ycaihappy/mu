<html>
<head>
<title>管理系统</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link href="/css/admin.css" rel="stylesheet" type="text/css" />

</head>
<body class="body">
<center>
    <div class="main">
    <div style="height:125px;"></div>
    
           <div class="bottom">
               <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'loginForm',
	'htmlOptions'=>array('class'=>'loginContainer'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
                  <table width="100%" height="377px;" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="38" valign="top" class="bgz"></td>
                          <td valign="top">
                          <table width="469px" height="377px" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td class="cen_t"></td>
                                  </tr>
                                  <tr>
                                    <td width="469px" height="310px" valign="top" class="bgbg">
                                     <div class="bt">后台用户登录</div>
                        <div class="yhxx">
                        <div>
                              <label>
                              <span class="wz">用户名:</span>
							  <span class="wb">
                               <?php echo $form->textField($model,'username',array('id'=>'userId')); ?>
		    <?php echo $form->error($model,'username'); ?>
                                                              </span>
                              </label>
                        
                         </div>
              <div><label><span class="wz">密码:</span>                            
                                <span class="wb"><?php echo $form->passwordField($model,'password',array('id'=>'userPwd')); ?>
		    <?php echo $form->error($model,'password'); ?>
                              </span></label>
                          
                          </div>
                            
                      
                        </div>
                        <div class="button">
                        <input style="border:none;" name="signIn" type="image" src="/css/imgs/admin/button.jpg">
                        </div>
                        <div class="bwz">
                        Powered by <a target="_blank" href="http://www.xxx.com">xxx.com</a> © 2007-2013
                        </div>     
                               </td>
                                  </tr>
                                  <tr>
                                    <td class="cen_b">&nbsp;</td>
                                  </tr>
                                </table>
                          </td>
                      <td width="38" valign="top" class="bgy">&nbsp;</td>
                    </tr>
                  </table>
                  
             </form>  
             
         </div>
    </div>
     
</center>

<?php $this->endWidget(); ?>
</body>
<script src="js/jquery.1.8.min.js"></script>
<script src="js/login.js" type="text/javascript"></script>
</html>