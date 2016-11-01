<?php

/*
 * Created on 2016-8-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

$current_id = $_GET['id'];
$status_code = $_GET['status_code'];
$ham_wo_bean = BeanFactory :: getBean('HAM_WO', $current_id);
$ham_wo_bean->wo_status = $status_code;
$ham_wo_bean->save();

?>
