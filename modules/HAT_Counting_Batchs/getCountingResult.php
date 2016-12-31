<?php
if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
require_once('modules/HAT_Counting_Tasks/populateLineCountInfo.php');
$counting_result=new CountInfo();
$id=$_POST['id'];
$result=$counting_result->populateLineCountInfo($id);
echo json_encode($result);
?>