<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 

//CUX20160210 在创建用户之前，创建或更新User的Format，包括姓名和电话.
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(1,'update fullname','custom/modules/Users/custom_full_name.php','UserLogics','logic_fill_name_phone');//20160209 Custom


$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 

//CUX20160210 在创建用户之后，创建或更新Contact.必须AfterSave，否则在Contact中可能捕获不到新的User.ID
$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(1,'Add or modify contact information according to users','custom/modules/Users/custom_sync_contact.php','UserAfterSaveLogics','sync_contact');//20160210 Custom
?>