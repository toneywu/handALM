<?php
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $db;
$woop_id = $_GET['record'];
$wo_id = $_GET['ham_wo_id'];
$include_reject_wo=$_GET['include_reject_wo_val'];

    $latest_woop_sql =  'SELECT  h.id FROM ham_woop h WHERE h.ham_wo_id = "'.$wo_id.'" and h.id!="'.$woop_id.'"  
							  AND h.act_module = "HIT_IP_TRANS_BATCH"
							  AND EXISTS 
							  (SELECT 
								1 
							  FROM
								hit_ip_trans_batch batch 
							  WHERE batch.source_woop_id = h.id 
								AND batch.source_wo_id = h.ham_wo_id 
								AND batch.deleted = 0 
								AND batch.asset_trans_status = "APPROVED") 
							ORDER BY h.woop_number DESC 
							LIMIT 0, 1';
	$latest_woop_result = $db->query($latest_woop_sql);
	while($latest_woop = $db->fetchByAssoc($latest_woop_result)) {
		 $latest_woop_id= $latest_woop["id"];
	}
	echo $latest_woop_sql."<br>";
	$latest_woop_bean = BeanFactory :: getBean('HAM_WOOP')->retrieve_by_string_fields(array (
													'id' => $latest_woop_id));	

if($include_reject_wo=='1'){
	//找到要驳回和当前最大的工序之间的工序
	$reject_woop_bean = BeanFactory :: getBean('HAM_WOOP', $woop_id);
	//要驳回到哪个工序 它的工序编号
	$reject_woop_number = $reject_woop_bean->woop_number;
	$reject_woop_bean->date_actual_finish = '';
	$reject_woop_bean->date_actual_start = '';
	$reject_woop_bean->woop_status = 'APPROVED';
	$reject_woop_bean->work_center_people_id = '';
	$reject_woop_bean->work_center_people = '';
	$reject_woop_bean->save();
	//驳回的工序对于的事物处理单
if ($reject_woop_bean->act_module == 'HIT_IP_TRANS_BATCH') {
	
	
	//start
	$reject_trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $latest_woop_bean->id . "'");
	foreach ($reject_trans_headers as $trans_header_bean) {
		$reject_trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
		foreach ($reject_trans_lines as $trans_line) {
			//子网段+网关设备+接入设备（主）+端口（主）” 四个字段组合为唯一性， 时间为最晚一笔网络事务处理单行
			$sql = 'SELECT hit_ip_allocations.id  FROM hit_ip_allocations WHERE hit_ip_allocations.deleted = 0 and hit_ip_allocations.hit_ip_subnets_id="'.$trans_line->hit_ip_subnets_id.'" and IFNULL(hit_ip_allocations.port,"")="'.$trans_line->port.'" and IFNULL(hit_ip_allocations.hat_assets_id,"")="'.$trans_line->hat_assets_id.'"'.'and IFNULL(hit_ip_allocations.access_assets_id,"")="'.$trans_line->access_assets_id.'" order by hit_ip_allocations.date_entered desc LIMIT 0,1';
			//$sql = 'SELECT hit_ip_allocations.id  FROM hit_ip_allocations WHERE hit_ip_allocations.deleted = 0 and hit_ip_allocations.id="'.$trans_line->history_id.'"';
			$hit_ip_allocation_result = $db->query($sql);
			$allocation_id="";
			while ($hit_ip_allocation = $db->fetchByAssoc($hit_ip_allocation_result)) {
				$allocation_id= $hit_ip_allocation["id"];
			}
			if($allocation_id!=""){
				$allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
													'id' => $allocation_id));
				echo $trans_line->mrtg_link;
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
				$allocation_line_bean->vlan_channel = "test";
				if ($allocation_line_bean->source_trans_id == null) {
					$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
					$allocation_line_bean->source_trans_id = $trans_line->id;
					$allocation_line_bean->source_wo_id = $parent->source_wo_id;
					$allocation_line_bean->source_woop_id = $parent->source_woop_id;
				}
				//事物处理单行行上面存历史表id
				$trans_line->history_id = $allocation_line_bean->id;
				$trans_line->deleted = 1;
				$trans_line->save();
				$allocation_line_bean->save();	
			}
		}
	}
	//end
	
	$reject_trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $reject_woop_bean->id . "'");
	foreach ($reject_trans_headers as $trans_header_bean) {
		$trans_header_bean->deleted = 1;
		$trans_header_bean->save();

		$reject_trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
		foreach ($reject_trans_lines as $trans_line) {
			$trans_line->deleted = 1;
			$trans_line->save();
		}
	}
} else
	if ($reject_woop_bean->act_module == 'HAT_Asset_Trans_Batch') {
		$reject_asset_trans_headers = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list('', "hat_asset_trans_batch.source_wo_id ='" . $wo_id . "' and hat_asset_trans_batch.source_woop_id='" . $reject_woop_bean->id . "'");
		foreach ($reject_asset_trans_headers as $trans_header_bean) {
			$trans_header_bean->deleted = 1;
			$trans_header_bean->save();
			$reject_asset_trans_lines = BeanFactory :: getBean("HAT_Asset_Trans")->get_full_list('', "hat_asset_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
			foreach ($reject_asset_trans_lines as $trans_line_bean) {
				$trans_line_bean->deleted = 1;
				$trans_line_bean->save();
			}
		}

	}

//
$between_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('', "ham_woop.ham_wo_id ='" . $wo_id . "' and ham_woop.woop_number>" . $reject_woop_number);
//之间的工序 需要更新工序的状态为等待前序 工单完成时间 清空  
foreach ($between_woops as $between_woop) {

	$between_woop->woop_status = 'WPREV';
	$between_woop->date_actual_start = '';
	$between_woop->date_actual_finish = '';
	$between_woop->work_center_people_id = '';
	$between_woop->work_center_people = '';
	$between_woop->save();
	//可能有多个事物处理单头
	$trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $between_woop->id . "'");
	//通过头找事物处理单行和分配行
	foreach ($trans_headers as $trans_header_bean) {
		//<1>事物处理单行
		$trans_header_bean->deleted = 1;
		$trans_header_bean->save();
		$trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
		foreach ($trans_lines as $trans_line_bean) {
			$trans_line_bean->deleted = 1;
			$trans_line_bean->save();
		}
	}

	//可能有多个事物处理单头
	$asset_trans_headers = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list('', "hat_asset_trans_batch.source_wo_id ='" . $wo_id . "' and hat_asset_trans_batch.source_woop_id='" . $between_woop->id . "'");
	foreach ($asset_trans_headers as $trans_header_bean) {
		$trans_header_bean->deleted = 1;
		$trans_header_bean->save();
		$asset_trans_lines = BeanFactory :: getBean("HAT_Asset_Trans")->get_full_list('', "hat_asset_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
		foreach ($asset_trans_lines as $trans_line_bean) {
			$trans_line_bean->deleted = 1;
			$trans_line_bean->save();
		}
	}
}
}else{
	//做工单驳回
	
    $between_woops = BeanFactory :: getBean("HAM_WOOP")->get_full_list('', 'ham_woop.ham_wo_id ="' . $wo_id . '"');
	//之间的工序 需要更新工序的状态为拟定 工单完成时间 清空  
	foreach ($between_woops as $between_woop) {
		$between_woop->woop_status = 'DRAFT';
		$between_woop->date_actual_start = '';
		$between_woop->date_actual_finish = '';
		$between_woop->work_center_people_id = '';
		$between_woop->work_center_people = '';
		echo $between_woop->name."<br>";
		$between_woop->save();
		
	//start	
	$reject_trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $latest_woop_bean->id . "'");
	foreach ($reject_trans_headers as $trans_header_bean) {
		$reject_trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
		foreach ($reject_trans_lines as $trans_line) {
			//子网段+网关设备+接入设备（主）+端口（主）” 四个字段组合为唯一性， 时间为最晚一笔网络事务处理单行
			$sql = 'SELECT hit_ip_allocations.id  FROM hit_ip_allocations WHERE hit_ip_allocations.deleted = 0 and hit_ip_allocations.hit_ip_subnets_id="'.$trans_line->hit_ip_subnets_id.'" and IFNULL(hit_ip_allocations.port,"")="'.$trans_line->port.'" and IFNULL(hit_ip_allocations.hat_assets_id,"")="'.$trans_line->hat_assets_id.'"'.'and IFNULL(hit_ip_allocations.access_assets_id,"")="'.$trans_line->access_assets_id.'" order by hit_ip_allocations.date_entered desc LIMIT 0,1';
			//$sql = 'SELECT hit_ip_allocations.id  FROM hit_ip_allocations WHERE hit_ip_allocations.deleted = 0 and hit_ip_allocations.id="'.$trans_line->history_id.'"';
			$hit_ip_allocation_result = $db->query($sql);
			$allocation_id="";
			while ($hit_ip_allocation = $db->fetchByAssoc($hit_ip_allocation_result)) {
				$allocation_id= $hit_ip_allocation["id"];
			}
			if($allocation_id!=""){
				$allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
													'id' => $allocation_id));
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
				$allocation_line_bean->vlan_channel = "test";
				if ($allocation_line_bean->source_trans_id == null) {
					$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
					$allocation_line_bean->source_trans_id = $trans_line->id;
					$allocation_line_bean->source_wo_id = $parent->source_wo_id;
					$allocation_line_bean->source_woop_id = $parent->source_woop_id;
				}
				//事物处理单行行上面存历史表id
				$trans_line->history_id = $allocation_line_bean->id;
				$trans_line->deleted = 1;
				$trans_line->save();
				$allocation_line_bean->save();	
			}
		}
	}
	//end
		
		
		
		
		//可能有多个事物处理单头
		$trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $between_woop->id . "'");
		foreach ($trans_headers as $trans_header_bean) {
			//<1>事物处理单行
			$trans_header_bean->deleted = 1;
			$trans_header_bean->save();
			$trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
			foreach ($trans_lines as $trans_line) {
				$trans_line->deleted = 1;
				$trans_line->save();
			}
		}

		//可能有多个事物处理单头
		$asset_trans_headers = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list('', "hat_asset_trans_batch.source_wo_id ='" . $wo_id . "' and hat_asset_trans_batch.source_woop_id='" . $between_woop->id . "'");
		foreach ($asset_trans_headers as $trans_header_bean) {
			$trans_header_bean->deleted = 1;
			$trans_header_bean->save();
			$asset_trans_lines = BeanFactory :: getBean("HAT_Asset_Trans")->get_full_list('', "hat_asset_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
			foreach ($asset_trans_lines as $trans_line_bean) {
				$trans_line_bean->deleted = 1;
				$trans_line_bean->save();
			}
		}
	}
	$reject_wo_bean = BeanFactory :: getBean('HAM_WO', $wo_id);
	$reject_wo_bean->wo_status='RETURNED';
	$reject_wo_bean->save();
}
	
?>