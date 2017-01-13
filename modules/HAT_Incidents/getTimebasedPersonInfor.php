<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
global $db;

$asset_id=$_GET['asset_id'];
$event_time=$_GET['event_time'];
//Add by zengchen 20170112
require_once("include/TimeDate.php");
$timedate= new TimeDate();
$event_time=new DateTime($event_time);	//将获取到的时间转为对象
$event_time=$timedate->asDb($event_time);//将对象传入TimeDate，转为+0时区时间
//End add 20170112
//先假设没有做过事务处理，取出当前的资产记录
$sql="SELECT c.`last_name`, c.`id` FROM hat_assets ha, contacts c WHERE ha.`using_person_id`=c.`id` AND c.`deleted`=0 AND ha.id='".$asset_id."'";
$result=$db->query($sql);
$res=$db->fetchByAssoc($result);
$person_id = $res['id'];
$person_name = $res['last_name'];
if (isset($res['id'])) {
	$person_id = $res['id'];
	$person_name = $res['last_name'];
}else{
	$person_id = '';
	$person_name = '';
}

//echo $sql;

//再取是否有历史的事务处理记录。如果没有的话，将保留之前的值


$sql="SELECT  c.`last_name`, c.`id`
		FROM  hat_asset_trans hat, contacts c
		WHERE hat.`asset_id` = '".$asset_id."'
		  AND hat.`deleted` = 0
		  AND (
		    hat.`trans_status` = 'AUTO_TRANSACTED'
		    OR hat.`trans_status` = 'CLOSED'
		  )
		  AND hat.`acctual_complete_date`>'".$event_time."'
		  AND hat.`target_using_person_id`=c.`id` AND c.`deleted`=0
		  ORDER BY hat.`acctual_complete_date` ASC
		  LIMIT 0,1";
//试图取出与传入日期之后
$result=$db->query($sql);
$res=$db->fetchByAssoc($result);
if (isset($res['id'])) {
	$person_id = $res['id'];
	$person_name = $res['last_name'];
}
//把数组转为json格式可以使用json_encode(array);
echo '{"id":"'.$person_id.'","name":"'.$person_name.'"}';
//echo $res['employee_number_c'];

?>