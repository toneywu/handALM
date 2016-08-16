<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 

$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 

//$hook_array['after_retrieve'] = Array(); 
//$hook_array['after_retrieve'][] = Array(1,'getEventType for EditView ','modules/HAT_Asset_Trans_Batch/hook_getEventType.php','getEventType','getEventType');//用于初始化数据

$hook_array['before_save'] = Array();
$hook_array['before_save'][] = Array(1,'getNumbering','custom/modules/HAM_SR/hook_beforeSaveChecking.php','beforeSaveChecking','getNumbering');//用于产生自动编号
$hook_array['before_save'][] = Array(2,'checkApprovalWorkflow','custom/modules/HAM_SR/hook_checkApprovalWorkflow.php','checkApprovalWorkflow','checkApprovalWorkflow');//用于审批工作流

?>