<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

//用于在工序状态变动前进行校验，核对相关的单据状态
$woop_number = $_REQUEST["woop_number"];
$ham_wo_id = $_REQUEST["ham_wo_id"];
$act_module = $_REQUEST["act_module"];

$woop_bean =BeanFactory :: getBean("HAM_WOOP")->get_full_list('', "ham_woop.woop_number=" . $woop_number . " and ham_woop.ham_wo_id='".$ham_wo_id."'");
$woop_id = $woop_bean[0]->id;

if($act_module=="HAT_Asset_Trans_Batch"){
	$trans_bean = BeanFactory :: getBean("HAT_Asset_Trans_Batch")->get_full_list('', "hat_asset_trans_batch.source_woop_id='" . $woop_id . "' and hat_asset_trans_batch.source_wo_id='".$ham_wo_id."'");
	//echo $trans_bean[0]->asset_trans_status;
/*	if(empty($trans_bean) || $trans_bean[0]->asset_trans_status!='APPROVED'){
		echo "N";
	}else{
		echo "Y";
	}
} else if($act_module=="HIT_IP_TRANS_BATCH"){
	$trans_bean = BeanFactory :: getBean("HIT_IP_TRANS_BATCH")->get_full_list('', "hit_ip_trans_batch.source_woop_id='" . $woop_id . "' and hit_ip_trans_batch.source_wo_id='".$ham_wo_id."'");
	if(empty($trans_bean) || $trans_bean[0]->asset_trans_status!="APPROVED"){
		echo "N";
	}else{
		echo "Y";*/
	if(count($trans_bean)>0){
		if(empty($trans_bean) || $trans_bean[0]->asset_trans_status!='APPROVED'){
			echo "N";
		}else{
			echo "Y";
		}
	}
} else if($act_module=="HIT_IP_TRANS_BATCH"){
	$trans_bean = BeanFactory :: getBean("HIT_IP_TRANS_BATCH")->get_full_list('', "hit_ip_trans_batch.source_woop_id='" . $woop_id . "' and hit_ip_trans_batch.source_wo_id='".$ham_wo_id."'");
	if(count($trans_bean)>0){
		if(empty($trans_bean) || $trans_bean[0]->asset_trans_status!="APPROVED"){
			echo "N";
		}else{
			echo "Y";
		}
	}
}else{
	echo "Y";
}

    
?>