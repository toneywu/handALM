<?php 

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
  
$current_id = $_GET['id']; 	
$ham_woop_beans = BeanFactory::getBean('HAM_WOOP')->get_full_list('','ham_woop.ham_wo_id="'.$current_id.'" and ham_woop.woop_status="COMPLETED"');
echo '<select name='.'"woop_num"'.' id="woop_num"'.'>';
foreach($ham_woop_beans as $woop_bean){
	echo '<option value="'.$woop_bean->id.'">'.$woop_bean->woop_number.'</option>';
}
echo '</select>';
echo '<div><p><input id="include_reject_wo" name="include_reject_wo" type="checkbox" value="1">退回至工单下达人</input></p></div>';
?>