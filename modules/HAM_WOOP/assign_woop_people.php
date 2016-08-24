<?php


/*
 * Created on 2016-8-23
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
error_reporting(E_ALL);
if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $current_user;
global $db;

$current_id = $_GET['id'];
//echo $current_id;
if (!empty ($current_id)) {
	$current_bean = BeanFactory :: getBean("HAM_WOOP")->retrieve_by_string_fields(array (
		'id' => $current_id
	));
		//echo $current_user->contact_id_c . "<br>";
		//echo $current_bean->ham_work_center_id . "<br>";
		//echo $current_bean->work_center_res_id . "<br>";
		//echo $current_bean->work_center_people_id . "<br>";

	//前提条件  负责人字段为空 -->如果有工作中心 加上工作中心 如果有资源加上资源 
	$sql = "SELECT      c.name resource_people_name
					           ,c.id    resource_people_id
								FROM   contacts_users u
								LEFT   JOIN ham_work_center_people c
								ON     u.contact_id = c.contact_id
								LEFT   JOIN ham_work_center_res r
								ON     c.work_center_res_id = r.id
								LEFT   JOIN ham_work_centers w
								ON     r.work_center_id = w.id
								WHERE  u.contact_id ='" . $current_user->contact_id_c . "'";
	if ($current_bean->work_center_people_id == null) {
		$sql = $sql . " and (w.id='" . $current_bean->ham_work_center_id . "'" . " or " . $current_bean->ham_work_center_id . " is null)";
		$sql = $sql . " and (r.id='" . $current_bean->work_center_res_id . "'" . " or " . $current_bean->work_center_res_id . " is null)";

		$bean_resource_people_list = $db->query($sql);
		$people_name = "";
		$people_id = "";
		while ($last_resource_people = $db->fetchByAssoc($bean_resource_people_list)) {
			$people_name = $last_resource_people['resource_people_name'];
			$people_id = $last_resource_people['resource_people_id'];
		}

		if ($people_name != null || $people_id == null) {
			$current_bean->work_center_people = $people_name;
			$current_bean->work_center_people_id = $people_id;
			$current_bean->save();
		}
	}
}
?>
