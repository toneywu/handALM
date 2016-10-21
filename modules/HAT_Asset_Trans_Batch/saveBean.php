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
$asset_trans_bean = BeanFactory :: getBean('HAT_Asset_Trans_Batch', $current_id);
$asset_trans_bean->asset_trans_status = $status_code;
$asset_trans_bean->save();

?>
