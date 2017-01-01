<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
$contact_id=$_GET['contact_id'];
global $db;
$sql="select employee_number_c from contacts_cstm where id_c='".$contact_id."'";
$result=$db->query($sql);
$res=$db->fetchByAssoc($result);
echo $res['employee_number_c'];
?>