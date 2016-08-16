<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['before_save'] = Array(); 
$hook_array['before_save'][] = Array(77, 'updateGeocodeInfo', 'modules/Contacts/ContactsJjwg_MapsLogicHook.php','ContactsJjwg_MapsLogicHook', 'updateGeocodeInfo');
$hook_array['before_save'][] = Array(1, 'Contacts push feed', 'modules/Contacts/SugarFeeds/ContactFeed.php','ContactFeed', 'pushFeed');
$hook_array['before_save'][] = Array(2,'logic_fill_name','custom/modules/Contacts/custom_full_name.php','ContactLogics','logic_fill_name');//20160209 Custom
$hook_array['before_save'][] = Array(3,'logic_fill_phone','custom/modules/Contacts/custom_full_name.php','ContactLogics','logic_fill_phone');//20160209 Custom
$hook_array['before_save'][] = Array(4,'update_users','custom/modules/Contacts/custom_update_users.php','updateSYSUser','update_SYSUser');//20160209 Custom

$hook_array['after_save'] = Array(); 
$hook_array['after_save'][] = Array(77, 'updateRelatedMeetingsGeocodeInfo', 'modules/Contacts/ContactsJjwg_MapsLogicHook.php','ContactsJjwg_MapsLogicHook', 'updateRelatedMeetingsGeocodeInfo');
$hook_array['after_save'][] = Array(1, 'Update Portal', 'modules/Contacts/updatePortal.php','updatePortal', 'updateUser');



?>