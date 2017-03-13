<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
//当前模块、业务框架和用户匹配到相应的权限策略

$module=$_POST['module_name'];
echo getFields($module);

function getFields($module){
	global $db,$current_user;
	$framework_id=$_SESSION["current_framework"];
	$sql="SELECT
		hgc.hpr_column_name,
		hgc.edit_enable_flag,
		hgc.hide_enable_flag
	FROM
		hpr_group_columns hgc
	LEFT JOIN hpr_group_priviliges hgp ON hgp.id = hgc.hpr_group_priviliges_id_c
	LEFT JOIN hpr_group_members hgm ON hgp.hpr_group_members_id_c = hgm.id
	LEFT JOIN hpr_groups_hpr_group_members_c hgmc ON hgm.id=hgmc.hpr_groups_hpr_group_membershpr_group_members_idb 
	LEFT JOIN hpr_groups hg ON hgmc.hpr_groups_hpr_group_membershpr_groups_ida=hg.id
	WHERE 1=1
	AND hg.enabled_flag=1
	AND hgm.enabled_flag=1
	AND hgm.user_id_c='".$current_user->id."'
	AND hgp.privilige_module='".$module."'
	AND hgp.deleted=0
	AND hgc.deleted=0
	AND hgm.deleted=0
	AND hg.deleted=0
	AND hg.haa_frameworks_id_c='".$framework_id."'";
	$result=$db->query($sql);
	while ($row=$db->fetchByAssoc($result)) {
		$fields[]=$row;
	}
	return json_encode($fields);
}
?>