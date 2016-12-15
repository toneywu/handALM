<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
  
$current_id = $_GET['id'];
$prodln = $_GET['prodln'];  	

$hit_subnets_bean = BeanFactory::getBean('HIT_IP_Subnets',$current_id);
if (isset($hit_subnets_bean->purpose)) {
	$purpose = $hit_subnets_bean->purpose;
}

echo '<select name='.'"line_purpose['.$prodln.']"'.' id="line_purpose'.$prodln.'" style="width: 153px;">';
echo '<option value=""></option>';		
foreach($app_list_strings['hit_ip_purpose_list'] as $key=>$value){
	if(!empty($purpose)&&$purpose==	$key){
		echo '<option selected="selected" value="'.$key.'">'.$value.'</option>';
	}
	else{
		echo '<option value="'.$key.'">'.$value.'</option>';
	}	
}
echo '</select>';
?>