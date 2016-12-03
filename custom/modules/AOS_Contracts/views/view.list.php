<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');
class AOS_ContractsViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
	parent::processSearchForm();
	$haa_frameworks_id=$_SESSION["current_framework"];
	if ($this->where) { 
		$this->where.=" AND EXISTS ( SELECT 1 FROM aos_contracts_cstm tc WHERE aos_contracts.id=tc.id_c AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
	}else{
		$this->where.=" EXISTS ( SELECT 1 FROM aos_contracts_cstm tc WHERE aos_contracts.id=tc.id_c AND tc.haa_frameworks_id_c='".$haa_frameworks_id."')";
	}
	//增加HPR权限控制逻辑
	global $current_user;
	require_once('modules/HPR_Group_Priviliges/checkListACL.php');
	$current_module = $this->module;
	$current_user_id =$current_user->id;
	$aclSQLList=getListViewSQLStatement($current_module,$current_user_id,$haa_frameworks_id);
	$this->where.=empty($this->where)?(empty($aclSQLList)?"":$aclSQLList):(empty($aclSQLList)?"":'  AND '.$aclSQLList);
	//End HPR权限控制逻辑
} 
/*function display()
{
	global $db;
	parent::display();
	var_dump($db->lastsql);
}*/
}