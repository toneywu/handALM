<?php
//本文件被 js/HAT_Asset_Trans_Batch_detailvew.js以Ajax的形式调用
//在DetailView上，如果当前记录是Draft状态，则有一个Submit按钮，点击按钮后，以Ajax的形式调用本文件。

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$bean = BeanFactory::getBean('HAT_Asset_Trans_Batch');
$bean->retrieve($_GET['id']);
$bean->asset_trans_status="SUBMITTED";

if(!$bean->ACLAccess('Save')){//确认访问权限
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}
$bean->save();

$bean->load_relationship('hat_asset_trans_batch_hat_asset_trans');
//处理所有相关联的行
foreach ($bean->hat_asset_trans_batch_hat_asset_trans->getBeans() as $line) {
    $line->trans_status = $bean->asset_trans_status;
    $line->save();
    $GLOBALS['log']->infor("Status changed by ajax, line_id = ". $line->id);
}

$bean->save();//再调用一次，为了触发AfterSave,确认是否需要将头彻底关闭

// Update status logic goes here
$GLOBALS['log']->infor("Status changed by ajax, id = ".$_GET['id']);
exit();