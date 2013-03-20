<div class="layout main">

	<div class="layout-area">
    <div class="m-chart" id="J_ChartMap" data-api="<?php echo Yii::app()->controller->createUrl('price/chart');?>">
    <div>
	<form id="form1" action="" method="post">
        <table width="25%" cellspacing="2" cellpadding="0" style="float: left;">
            <tbody>
            <!--
            <tr>
                <td>
                    起始日
                </td>
                <td>
                    <input type="text"  value="" name="txtBeginDate" class="datepicker cmp-input" />
                </td>
            </tr>
            <tr>
                <td>
                    截止日
                </td>
                <td>
                    <input type="text"  value="" name="txtEndDate" class="datepicker cmp-input" />
                </td>
            </tr>-->
            <tr>
            <td>请选择年份</td><td><select name="year"><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option></select></td>
            <tr>
                <td>
                    品种
                </td>
                <td>
                    <select name="sum_type">
<?php
$i = 0;
foreach ($category as $id=>$name)
{
    $class = ($i ==0 ) ? 'selected' : '';
?>
    <option value="<?php echo $id;?>" selected="<?php echo $class;?>"><?php echo $name;?></option>
<?php
    $i++;
}
?>
</select>
                </td>
            </tr>          
            <tr>
                <td>
                    城市
                </td>
                <td>
				<div class="city">
<?php 

$total = count($city_mu);
foreach ($city_mu as $city)
{

?>
    <label><input type="checkbox" value="<?php echo $city->city_id;?>" name="city[]" /><?php echo $city->city_name;?></label>
<?php
}
?>
				</div>                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" onclick="" value=" 搜索 " class="btn-red">
                    
                </td>
            </tr>
        </tbody></table>
		 </form>
        <div style="float: left; width: 70%; margin-left: 10px;">
            <div id="container">
                
            </div>
        </div>
    </div>
   
	</div>
		
</div>
<?php 
$cs=Yii::app()->getClientScript();
$cs->registerCssFile('css/ui-lightness/jquery-ui-1.10.1.custom.min.css');
Yii::app()->getClientScript()->registerCoreScript('jquery');
Yii::app()->getClientScript()->registerCoreScript('jquery.ui');

?>


