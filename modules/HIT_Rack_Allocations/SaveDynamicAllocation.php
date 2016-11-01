<?php 
//在机柜分配时会调用本文件进行
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

$current_id = $_GET['id'];
$status_code = $_GET['status_code'];
/*$ham_wo_bean = BeanFactory :: getBean('HAM_WO', $current_id);
$ham_wo_bean->wo_status = $status_code;
$ham_wo_bean->save();
*/

print_r($_REQUEST);

?>
