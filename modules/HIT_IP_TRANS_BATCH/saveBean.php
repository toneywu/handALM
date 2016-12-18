<?php

/*
 * Created on 2016-8-12
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');

$current_id = $_GET['id'];
$status_code = $_GET['status_code'];
$trans_bean = BeanFactory :: getBean('HIT_IP_TRANS_BATCH', $current_id);
$trans_bean->asset_trans_status = $status_code;


$trans_line_beans = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_bean->id . "'");
count(count($trans_line_beans));
foreach($trans_line_beans as $trans_line_bean){
	
	save_allocation_lines($trans_line_bean,$trans_bean);

}


$trans_bean->save();

function save_allocation_lines($trans_line_bean, $parent) {
	/**
	 * 循环所有网络事务处理行
	 */
	global $db;
	$trans_line = new HIT_IP_TRANS();
	$trans_line->retrieve($trans_line_bean->id);
	
	echo "-----id = ".$trans_line_bean->port."<br>";
	$sql ='SELECT h.id
			FROM hit_ip_allocations h
			WHERE IFNULL(h.port,"$$$$$")=IFNULL("'.$trans_line_bean->port.'","$$$$$")
			and   h.enable_action=1
			AND   IFNULL(h.hit_ip_subnets_id,"$$$$$")=IFNULL("'.$trans_line_bean->hit_ip_subnets_id.'","$$$$$")
			AND   h.deleted=0';
		echo $sql;
		$result = $db->query($sql);
		while($row = $GLOBALS['db']->fetchByAssoc($result))
		{
			$id = $row['id'];
		}
	if(!empty($trans_line->hit_ip_subnets_id)){
		if (count($id)> 0&&$id!="0") {
			//更新
			echo "allocation update";
			   $allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
												'id' => $id));		
				echo "allocation_line_bean = ".$id."<br>";
				$allocation_line_bean->name = $trans_line->name;
				$allocation_line_bean->hit_ip_subnets_id = $trans_line->hit_ip_subnets_id;
				$allocation_line_bean->hit_ip_subnets = $trans_line->hit_ip_subnets;
				$allocation_line_bean->associated_ip = $trans_line->associated_ip;
				$allocation_line_bean->mask = $trans_line->mask;
				$allocation_line_bean->gateway = $trans_line->gateway;
				$allocation_line_bean->bandwidth_type = $trans_line->bandwidth_type;
				$allocation_line_bean->port = $trans_line->port;
				$allocation_line_bean->speed_limit = $trans_line->speed_limit;
				$allocation_line_bean->hat_assets_id = $trans_line->hat_assets_id;
				$allocation_line_bean->hat_asset_name = $trans_line->hat_asset_name;
				$allocation_line_bean->hat_assets_cabinet_id = $trans_line->hat_assets_cabinet_id;
				$allocation_line_bean->cabinet = $trans_line->cabinet;
				$allocation_line_bean->monitoring = $trans_line->monitoring;
				$allocation_line_bean->channel_num = $trans_line->channel_num;
				$allocation_line_bean->channel_content = $trans_line->channel_content;
				$allocation_line_bean->mrtg_link = $trans_line->mrtg_link;
				$allocation_line_bean->line_parent_ip = $trans_line->line_parent_ip;
				$allocation_line_bean->access_asset_name = $trans_line->access_asset_name;
				$allocation_line_bean->access_assets_id = $trans_line->access_assets_id;
				$allocation_line_bean->status = $trans_line->status;
				$allocation_line_bean->port_backup = $trans_line->port_backup;
				$allocation_line_bean->monitoring_backup = $trans_line->monitoring_backup;
				$allocation_line_bean->channel_content_backup = $trans_line->channel_content_backup;
				$allocation_line_bean->channel_num_backup = $trans_line->channel_num_backup;
				$allocation_line_bean->date_start = $trans_line->date_start;
				$allocation_line_bean->date_end = $trans_line->date_end;
				$allocation_line_bean->access_assets_backup_id = $trans_line->access_assets_backup_id;
				$allocation_line_bean->target_owning_org_id = $parent->target_owning_org_id;
				$allocation_line_bean->target_owning_org = $parent->target_owning_org;
				$allocation_line_bean->enable_action = $trans_line->enable_action;
				$allocation_line_bean->broadband_type = $trans_line->broadband_type;
				$allocation_line_bean->child_port = $trans_line->child_port;
				$allocation_line_bean->vlan_channel = $trans_line->vlan_channel;
				if ($allocation_line_bean->source_trans_id == null) {
					$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
					//$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
					$allocation_line_bean->source_trans_id = $trans_line->id;
					$allocation_line_bean->source_wo_id = $parent->source_wo_id;
					$allocation_line_bean->source_woop_id = $parent->source_woop_id;
				}
				
				//事物处理单行行上面存历史表id
				$trans_line->history_id = $allocation_line_bean->id;
				$trans_line->save();
				
				$allocation_line_bean->save();												
		} else {
			//新增行
			$allocation_line_bean = BeanFactory :: newBean("HIT_IP_Allocations");
			$allocation_line_bean->name = $trans_line->name;
			$allocation_line_bean->hit_ip_subnets_id = $trans_line->hit_ip_subnets_id;
			$allocation_line_bean->hit_ip_subnets = $trans_line->hit_ip_subnets;
			$allocation_line_bean->associated_ip = $trans_line->associated_ip;
			$allocation_line_bean->mask = $trans_line->mask;
			$allocation_line_bean->gateway = $trans_line->gateway;
			$allocation_line_bean->bandwidth_type = $trans_line->bandwidth_type;
			$allocation_line_bean->port = $trans_line->port;
			$allocation_line_bean->speed_limit = $trans_line->speed_limit;
			$allocation_line_bean->hat_assets_id = $trans_line->hat_assets_id;
			$allocation_line_bean->hat_asset_name = $trans_line->hat_asset_name;
			$allocation_line_bean->hat_assets_cabinet_id = $trans_line->hat_assets_cabinet_id;
			$allocation_line_bean->cabinet = $trans_line->cabinet;
			$allocation_line_bean->monitoring = $trans_line->monitoring;
			$allocation_line_bean->channel_num = $trans_line->channel_num;
			$allocation_line_bean->channel_content = $trans_line->channel_content;
			$allocation_line_bean->mrtg_link = $trans_line->mrtg_link;
			$allocation_line_bean->line_parent_ip = $trans_line->line_parent_ip;
			$allocation_line_bean->access_asset_name = $trans_line->access_asset_name;
			$allocation_line_bean->access_assets_id = $trans_line->access_assets_id;
			$allocation_line_bean->status = $trans_line->status;
			$allocation_line_bean->port_backup = $trans_line->port_backup;
			$allocation_line_bean->monitoring_backup = $trans_line->monitoring_backup;
			$allocation_line_bean->channel_content_backup = $trans_line->channel_content_backup;
			$allocation_line_bean->channel_num_backup = $trans_line->channel_num_backup;
			$allocation_line_bean->date_start = $trans_line->date_start;
			$allocation_line_bean->date_end = $trans_line->date_end;
			$allocation_line_bean->access_assets_backup_id = $trans_line->access_assets_backup_id;
			$allocation_line_bean->target_owning_org_id = $parent->target_owning_org_id;
			$allocation_line_bean->target_owning_org = $parent->target_owning_org;
			$allocation_line_bean->enable_action = $trans_line->enable_action;
			$allocation_line_bean->broadband_type = $trans_line->broadband_type;
			$allocation_line_bean->child_port = $trans_line->child_port;
				$allocation_line_bean->vlan_channel = $trans_line->vlan_channel;
			if ($allocation_line_bean->source_trans_id == null) {
				$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
				//$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
				$allocation_line_bean->source_trans_id = $trans_line->id;
				$allocation_line_bean->source_wo_id = $parent->source_wo_id;
				$allocation_line_bean->source_woop_id = $parent->source_woop_id;
			}
			
			//事物处理单行行上面存历史表id
			$trans_line->history_id = $allocation_line_bean->id;
			$trans_line->save();
			
			$allocation_line_bean->save();
		}
	}
}



?>
