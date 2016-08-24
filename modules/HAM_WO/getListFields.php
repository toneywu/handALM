<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
  
$current_id = $_GET['id']; 	
$ham_wo_bean = BeanFactory::getBean('HAM_WO',$current_id);
$current_status = $ham_wo_bean->wo_status;
echo '<select name='.'"wo_status"'.' id="wo_status"'.'>';
foreach($app_list_strings['ham_wo_status_list'] as $key=>$value){
	
if($current_status=="DRAFT"){
	if($key=="SUBMITTED"||$key=="CLOSED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="SUBMITTED" ) {
	if($key=="SUBMITTED"||$key=="SUBMITTED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="APPROVED" ||$current_status=="RELEASED"||$current_status=="REWORK") {
	if($key=="APPROVED"||$key=="WSCH"||$key=="WMATL"||$key=="WPCOND"||$key=="INPRG"||$key=="CANCELED"||$key=="REWORK"||$key=="RELEASED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="CANCELED" ) {
	if($key=="CANCELED"||$key=="CANCELED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="CLOSED" ) {
	if($key=="CLOSED"||$key=="REWORK"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="COMPLETED" ) {
	if($key=="COMPLETED"||$key=="REWORK"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="WSCH" ) {
	if($key=="WSCH"||$key=="WMATL"||$key=="WPCOND"||$key=="INPRG"||$key=="CANCELED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="WMATL" ) {
	if($key=="WSCH"||$key=="WMATL"||$key=="WPCOND"||$key=="INPRG"||$key=="CANCELED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="WPCOND" ){
	if($key=="WSCH"||$key=="WMATL"||$key=="WPCOND"||$key=="INPRG"||$key=="CANCELED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}elseif ( $current_status=="INPRG" ) {
	if($key=="WSCH"||$key=="WMATL"||$key=="WPCOND"||$key=="INPRG"||$key=="CANCELED"){
		echo '<option value="'.$key.'">'.$value.'</option>';
	}
}	
}

echo '</select>';
?>