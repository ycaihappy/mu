     <div class="m-breadcrumb">
     <p>
<?php
$i = 0;
foreach($this->crumbs as $crumb) {
    if ( $i == 0)
        echo '<b class="crumb"></b>'.$crumb['name'];
    else
        echo '<i></i>'.$crumb['name'];
    $i++;
}
?>
     </p>
     </div> 
