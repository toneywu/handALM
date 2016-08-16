<?php
//本文件被 js/HAM_SR_detailvew.js以Ajax的形式调用
//在DetailView上，如果当前记录是Draft状态，则有一个Submit按钮，点击按钮后，以Ajax的形式调用本文件。

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$bean = BeanFactory::getBean('HAM_SR');
$bean->retrieve($_GET['id']);
$bean->sr_status="SUBMITTED";

if(!$bean->ACLAccess('Save')){//确认访问权限
    ACLController::displayNoAccess(true);
    sugar_cleanup(true);
}
$bean->save();

// Update status logic goes here
$GLOBALS['log']->infor("Status changed by ajax, id = ".$_GET['id']);
exit();