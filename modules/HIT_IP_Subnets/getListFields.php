<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
  
$current_id = $_GET['id'];
$prodln = $_GET['prodln'];  	
$hit_subnets_bean = BeanFactory::getBean('HIT_IP_Subnets',$current_id);
$ip_type = $hit_subnets_bean->ip_type;
echo '<select name='.'"line_ip_type['.$prodln.']"'.' id="line_ip_type'.$prodln.'" style="width: 153px;">';
echo '<option value=""></option>';		
foreach($app_list_strings['hit_ip_type_list'] as $key=>$value){
	if(!empty($ip_type)&&$ip_type==	$key){
		echo '<option selected="selected" value="'.$key.'">'.$value.'</option>';
	}
	else{
		echo '<option value="'.$key.'">'.$value.'</option>';
	}	
}
echo '</select>';
?>