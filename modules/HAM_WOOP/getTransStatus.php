<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

$ham_woop_id = $_REQUEST["record"];
$ham_wo_id = $_REQUEST["ham_wo_id"];
$act_module = $_REQUEST["act_module"];   


if($act_module=="HAT_Asset_Trans_Batch"){
	$trans_bean = BeanFactory :: getBean("HAT_Asset_Trans_Batch")->get_full_list('', "hat_asset_trans_batch.source_woop_id=" . $ham_woop_id . "' and hat_asset_trans_batch.source_wo_id='".$ham_wo_id."'");
	if($trans_bean->status!="APPROVED"){
		echo "N";
	}else{
		echo "Y";
	}
} else if($act_module=="HIT_IP_TRANS_BATCH"){
	$trans_bean = BeanFactory :: getBean("HIT_IP_TRANS_BATCH")->get_full_list('', "hit_ip_trans_batch.source_woop_id=" . $ham_woop_id . "' and hit_ip_trans_batch.source_wo_id='".$ham_wo_id."'");
	if($trans_bean->status!="APPROVED"){
		echo "N";
	}else{
		echo "Y";
	}
}   
    
    