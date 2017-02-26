<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 

$hook_version = 1; 
$hook_array = Array(); 
// position, file, function 

$hook_array['before_save'] = Array();

$hook_array['before_save'][] = Array(1,
			'Fill Attribute9 as ContractID from IT_Racks - ChinaCache Only', //Label. A string value to identify the hook.
			'custom/modules/HAT_Asset_Trans/ChinaCache_BeforeSave_FillAttr9.php', //The PHP file where your class is located.
			'ChinaCache_CUX_HAT_Asset_Trans', //The class the method is in.
			'cc_FillAttr9'); //The method to call. 
//ChinaCache

?>