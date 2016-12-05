<?php
/*
 * Created on 2016-12-05
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 先判断是否具有创建收支项的权限
 */
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
if(!(ACLController::checkAccess('HAOS_Revenues_Quotes', 'edit', true))){
	ACLController::displayNoAccess();
	echo "N";
}
else{
	echo "Y";
}
?>
