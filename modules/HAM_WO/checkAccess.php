<?php


/*
 * Created on 2016-8-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 * 先判断是否具有权限 再判断当前状态是否正确
 */
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $current_user;
global $db;

$current_id = $_GET['id'];

if (!empty($current_id)) {

	$ham_wo_bean = BeanFactory :: getBean('HAM_WO', $current_id);
	$wo_status = $ham_wo_bean->wo_status;
	$sql = "SELECT COUNT(1) cnt_num
						FROM   users_cstm u
						LEFT   JOIN ham_work_center_people c
						ON     (u.contact_id_c = c.contact_id and c.deleted=0)
						LEFT   JOIN ham_work_center_res r
						ON     (c.work_center_res_id = r.id and r.deleted=0)
						LEFT   JOIN ham_work_centers w
						ON     (r.work_center_id = w.id and w.deleted=0)
						WHERE  u.contact_id_c ='" . $current_user->contact_id_c . "'";
	$show_flag = "N";
	$work_center_id = $ham_wo_bean->work_center_id;
	$work_center_res_id = $ham_wo_bean->work_center_res_id;
	$work_center_people_id = $ham_wo_bean->work_center_people_id;
	$access_code = $ham_wo_bean->work_order_access;
	$result_records = $db->query($sql);

	if ($access_code == "PUCBLIC") {
		$show_flag = "Y";
	}
	elseif ($access_code == "OWNER") {
		$ham_wo_center_people_bean = BeanFactory :: getBean('HAM_Work_Center_People', $ham_wo_bean->work_center_people_id);
		if ($current_user->contact_id_c == $ham_wo_center_people_bean->contact_id) {
			$show_flag = "Y";
		}
	}
	elseif ($access_code == "RESOURCE") {
		$sql = $sql . " and (r.id='" . $work_center_res_id . "'" . " or " . $work_center_res_id . " is null)";

	}
	elseif ($access_code == "WORKCENTER"||$access_code =="") {
		$sql = $sql . " and (w.id='" . $work_center_id . "'" . " or " . $work_center_id . " is null)";
	}
	if ($access_code == "RESOURCE" or $access_code == "WORKCENTER"or $access_code == "") {
		while ($result_record = $db->fetchByAssoc($result_records)) {
			if($result_record["cnt_num"]>0){
				$show_flag = "Y";
			}
		}
	}
	//工作单状态为取消、已提交审批、已拒绝、已结束、工作完成界面时，工作单编辑界面不可用。如果进入后自动跳转到详细查看界面。 
	if ($wo_status=="CANCELED"||$wo_status=="SUBMITTED"||$wo_status=="CLOSED"||$wo_status=="COMPLETED"){
		$show_flag="N";
	}
	echo "$show_flag";
}else{
	echo "Y";
	
	
}
?>
