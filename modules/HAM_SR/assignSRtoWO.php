<?php
//本文件被 js/HAM_SR_detailvew.js以Ajax的形式调用
//在DetailView上，如果当前记录是Draft状态，则有一个Submit按钮，点击按钮后，以Ajax的形式调用本文件。

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$GLOBALS['log']->infor("WO linking by ajax");
$GLOBALS['log']->infor("start wo_id = ".$_GET['wo_id']." sr_id=".$_GET['sr_id']);

$bean = BeanFactory::getBean('HAM_SR',$_GET['sr_id']);
$bean->ham_wo_id = $_GET['wo_id'];
$bean->sr_status = "WORKING";


if(!$bean->ACLAccess('Save')){//确认访问权限
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}
$bean->save();

// Update status logic goes here
$GLOBALS['log']->infor("WO linked by ajax");
exit();