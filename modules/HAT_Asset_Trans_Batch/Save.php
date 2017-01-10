<?php

//global $current_user;
$beanHeader = new HAT_Asset_Trans_Batch();
$beanHeader->retrieve($_POST['record']);

if (!empty($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
    $check_notify = TRUE; //如果指定了负责人，并且与当前录入人不同，就通知对应的人员进行处理。
} else {
    $check_notify = FALSE;
}

require_once('include/formbase.php');
$save_header_status = $beanHeader->asset_trans_status;

require_once('modules/HAT_Asset_Trans_Batch/saveTransHeader.php');
$beanHeader = save_header($beanHeader, $check_notify);//保存头
$return_id = $beanHeader->id;

require_once('modules/HAT_Asset_Trans/SaveAssetTransLines.php');
save_lines($_POST, $beanHeader, 'line_',$need_allocation);//保存行

//检查当前头是否可以关闭，如果所有行都已经处理完毕，则可以将头状态关闭
//included in saveTransHeader.php
checkHeaderClose($beanHeader);

handleRedirect($return_id, 'HAT_Asset_Trans_Batch');

?>