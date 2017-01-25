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
//以上用于将前端POST过来的FORM字段进行快速的对应保存
//$save_header_status = $beanHeader->asset_trans_status;


require_once('modules/HAT_Asset_Trans_Batch/saveTransHeader.php');
$beanHeader = save_header($beanHeader, $check_notify);//保存头
$return_id = $beanHeader->id;


require_once('modules/HAT_Asset_Trans/SaveAssetTransLines.php');
//save_lines($_POST, $beanHeader, 'line_',$need_allocation);//保存行
//20170125 toney.wu之前有个need_allocation的输入参数，但拓对应save_lines中没有看到这个参数有被使用，所以将其删除
save_lines($_POST, $beanHeader, 'line_');//保存行


//检查当前头是否可以关闭，如果所有行都已经处理完毕，则可以将头状态关闭
//included in saveTransHeader.php
checkHeaderClose($beanHeader);

handleRedirect($return_id, 'HAT_Asset_Trans_Batch');

?>