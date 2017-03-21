<?php
//error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

global $db;
$Id=$_POST["record"]; 
$cur_module=$_POST["cur_module"]; 
require_once('modules/'.$cur_module.'/InfoToInvoiceEditView.php');
$result = getInfo($Id);

echo json_encode($result);
//echo json_encode(array('type'=>1,'value'=>$re_cords,'cord'=>$account));


?>