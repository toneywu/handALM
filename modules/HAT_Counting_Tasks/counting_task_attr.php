<?php

$module_id='';
$prefix='';
$prodln='';
$template_id=$_POST["id"];
$template_type=$_POST["type"];
$module_name=$_POST["module_name"];
$module_action=$_POST["module_action"];
$module_id=$_POST["module_id"];
$prefix=$_POST["prefix"];
$prodln=$_POST["prodln"];
require_once('modules/HAT_Counting_Tasks/attr_replace.php');
$attr_replace=new Attr_Replace();
$template_arr=array(
	'template_id' => $template_id,
	'template_type' => $template_type,
	'module_name' => $module_name,
	'module_action' => $module_action,
	'module_id' => $module_id,
	'prefix' => $prefix,
	'prodln' => $prodln,
	);
$return_data=$attr_replace->attr_info($template_arr);
echo $return_data;