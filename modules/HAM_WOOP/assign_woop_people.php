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
								FROM   contacts u
								LEFT   JOIN ham_work_center_people c
								ON     u.id = c.contact_id
								LEFT   JOIN ham_work_center_res r
								ON     c.work_center_res_id = r.id
								LEFT   JOIN ham_work_centers w
								ON     r.work_center_id = w.id
								WHERE  u.id ='" . $current_user->contact_id_c . "'";
	if ($current_bean->work_center_people_id == null) {
		if ($current_bean->ham_work_center_id!=null){
		$sql = $sql . " and (w.id='" . $current_bean->ham_work_center_id ."')";
		}
		if($current_bean->work_center_res_id!=null){
		$sql = $sql . " and (r.id='" . $current_bean->work_center_res_id . "')";
		}
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
			//如果这里Owner有值。把Owner对应的User-id写到HAM_WOOP对应的assigned_user_id字段
			$res_people_bean = BeanFactory :: getBean('HAM_Work_Center_People', $people_id);
			if(!empty($res_people_bean->contact_id)){
				$contact_bean = BeanFactory :: getBean('Contacts', $res_people_bean->contact_id);
				$current_bean->assign_user_id = $contact_bean->user_id_c;
			}
			$current_bean->save();
		}
	}
}
?>
