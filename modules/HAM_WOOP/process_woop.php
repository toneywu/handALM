<?php
error_reporting(E_ALL);

if (!defined('sugarEntry') || !sugarEntry)
	die('Not A Valid Entry Point');
global $db,$timedate;

function transfer_string($str){
	if(empty($str)){
		return "";
	}else{
		return $str;
	}
}


$woop_id = $_GET['record'];
$wo_id = $_GET['ham_wo_id'];
$include_reject_wo=$_GET['include_reject_wo_val'];  // 1 工序回退， 0 工单回退

//找到要驳回和当前最大的工序之间的工序
$reject_woop_bean = BeanFactory :: getBean('HAM_WOOP', $woop_id);
//要驳回到哪个工序 它的工序编号
$reject_woop_number = $reject_woop_bean->woop_number;
//$reject_woop_bean->date_actual_finish = '';
//$reject_woop_bean->date_actual_start = '';
//$reject_woop_bean->woop_status = 'APPROVED'; --稍等
//20170220将马丁在CC项目的要求，负责人在回时不清空
/*	$reject_woop_bean->work_center_people_id = '';
	$reject_woop_bean->work_center_people = '';
*/
//$reject_woop_bean->save();
if ($include_reject_wo==0){
	$reject_woop_number=0;
}
//需要先处理未退之前状态为已审批的工序	
/*$a_sql = 'select  h.id FROM ham_woop h WHERE h.ham_wo_id = "'.$wo_id.'" AND h.woop_status = "APPROVED" AND h.woop_number >= '.$reject_woop_number.' ORDER BY h.woop_number desc LIMIT 1';
$a_sql_result = $db->query($a_sql);
echo 'wo_id:'.$wo_id;
echo 'reject_woop_number:'.$reject_woop_number;
while($first_woop = $db->fetchByAssoc($a_sql_result)) {
	echo 'firstwoopid:'.$first_woop["id"];
	reverse_asset($first_woop_bean->id, $wo_id, 1);
	$first_woop_bean = BeanFactory :: getBean('HAM_WOOP')->retrieve_by_string_fields(array ('id' => $first_woop["id"]));
	$first_woop_bean->woop_status = 'WPREV';
	$first_woop_bean->date_actual_start = '';
	$first_woop_bean->date_actual_finish = '';
	$first_woop_bean->work_center_people_id = '';
	$first_woop_bean->work_center_people = '';
	$first_woop_bean->save();
	deleteTrans($wo_id,$first_woop_bean->id);
}*/

$between_woop_sql =  'SELECT  h.id FROM ham_woop h WHERE h.ham_wo_id = "'.$wo_id.'" 
						AND h.woop_status in ("COMPLETED","APPROVED")
						AND h.woop_number >= '.$reject_woop_number.'
						ORDER BY h.woop_number DESC'; //退回至的工序及后面完成的工序
$between_woop_result = $db->query($between_woop_sql);
while($between_woop = $db->fetchByAssoc($between_woop_result)) {
	$now_woop_bean = BeanFactory :: getBean('HAM_WOOP')->retrieve_by_string_fields(array ('id' => $between_woop["id"]));
	echo '当前退回的工序:'.$now_woop_bean->woop_number;
	if($now_woop_bean->act_module == 'HIT_IP_TRANS_BATCH'){
		//如果当前回退到的工序是网络事务处理单，则获取当前事务处理单头表
		$reject_trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $now_woop_bean->id . "'");
		if (isset($reject_trans_headers)) {
			foreach ($reject_trans_headers as $trans_header_bean) { 
				//将处理单头表状态还原到DRAFT拟定
				$trans_header_bean->asset_trans_status = 'DRAFT';
				$trans_header_bean->save();
				//根据处理单头遍历所有的处理单行
				$reject_trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
				if (isset($reject_trans_lines)) {
					foreach ($reject_trans_lines as $trans_line) {
						$allocation_id=$trans_line->history_id;
						echo "当前的trans行".$trans_line->id."找到的allocationID=".$allocation_id."<br>";
						$really_trans_sql =    'SELECT  h.id 
						                        FROM hit_ip_trans h LEFT JOIN hit_ip_trans_batch hitb 
						                        ON h.hit_ip_trans_batch_id=hitb.id
						                        WHERE h.history_id = "'.$allocation_id.'" 
										        AND h.deleted=0
										        AND hitb.asset_trans_status = "CLOSED"
												ORDER BY h.date_modified DESC
												LIMIT 1';
						$really_trans_result = $db->query($really_trans_sql);
						$really_trans_id='';
						while($really_trans =  $db->fetchByAssoc($really_trans_result)) {
							 $really_trans_id= $really_trans["id"];
						}
						if(empty($really_trans_id)){
							echo '找不到更前完成的ip分配，执行删除allocation';
							$allocation_beans = BeanFactory :: getBean("HIT_IP_Allocations")->get_full_list('', "hit_ip_allocations.id ='" . $allocation_id . "'");
							foreach ($allocation_beans as $allocation_bean) {
								$allocation_bean->deleted = 1;
								$allocation_bean->save();
							}
							$trans_line->history_id='';
							$trans_line->save();
						}else{
							$trans_line = BeanFactory :: getBean('HIT_IP_TRANS')->retrieve_by_string_fields(array (
																	    'id' => $really_trans_id));
							echo "执行用来覆盖allocation表的trans_id = ".$trans_line->id."<br>";
							if ($allocation_id != "") {
								$allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
																	'id' => $allocation_id));
								$allocation_line_bean->name = transfer_string($trans_line->name);
								$allocation_line_bean->hit_ip_subnets_id = $trans_line->hit_ip_subnets_id;
								$allocation_line_bean->hit_ip_subnets = $trans_line->hit_ip_subnets;
								$allocation_line_bean->associated_ip = $trans_line->associated_ip;
								$allocation_line_bean->mask = transfer_string($trans_line->mask);
								$allocation_line_bean->gateway = transfer_string($trans_line->gateway);
								$allocation_line_bean->bandwidth_type = transfer_string($trans_line->bandwidth_type);
								$allocation_line_bean->port = transfer_string($trans_line->port);
								$allocation_line_bean->speed_limit = transfer_string($trans_line->speed_limit);
								$allocation_line_bean->hat_assets_id = $trans_line->hat_assets_id;
								$allocation_line_bean->hat_asset_name = $trans_line->hat_asset_name;
								$allocation_line_bean->hat_assets_cabinet_id = $trans_line->hat_assets_cabinet_id;
								$allocation_line_bean->cabinet = transfer_string($trans_line->cabinet);
								$allocation_line_bean->monitoring = transfer_string($trans_line->monitoring);
								$allocation_line_bean->channel_num = transfer_string($trans_line->channel_num);
								$allocation_line_bean->channel_content = transfer_string($trans_line->channel_content);
								$allocation_line_bean->mrtg_link = transfer_string($trans_line->mrtg_link);
								$allocation_line_bean->line_parent_ip = $trans_line->line_parent_ip;
								$allocation_line_bean->access_asset_name = $trans_line->access_asset_name;
								$allocation_line_bean->access_assets_id = $trans_line->access_assets_id;
								$allocation_line_bean->status = $trans_line->status;
								$allocation_line_bean->port_backup = transfer_string($trans_line->port_backup);
								$allocation_line_bean->monitoring_backup = transfer_string($trans_line->monitoring_backup);
								$allocation_line_bean->channel_content_backup = transfer_string($trans_line->channel_content_backup);
								$allocation_line_bean->channel_num_backup = transfer_string($trans_line->channel_num_backup);
								$allocation_line_bean->date_start = $trans_line->date_start;
								$allocation_line_bean->date_end = $trans_line->date_end;
								$allocation_line_bean->access_assets_backup_id = $trans_line->access_assets_backup_id;
								//$allocation_line_bean->target_owning_org_id = $parent->target_owning_org_id;
								//$allocation_line_bean->target_owning_org = $parent->target_owning_org;
								$allocation_line_bean->enable_action = $trans_line->enable_action;
								$allocation_line_bean->broadband_type = transfer_string($trans_line->broadband_type);
								$allocation_line_bean->child_port = $trans_line->child_port;
								$allocation_line_bean->vlan_channel = transfer_string($trans_line->vlan_channel);
								if ($allocation_line_bean->source_trans_id == null) {
									$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
									$allocation_line_bean->source_trans_id = $trans_line->id;
									$allocation_line_bean->source_wo_id = $parent->source_wo_id;
									$allocation_line_bean->source_woop_id = $parent->source_woop_id;
								}
								//事物处理单行行上面存历史表id
								$trans_line->history_id = $allocation_line_bean->id;
								$trans_line->save();
								$allocation_line_bean->save();
							}//end if ($allocation_id != "")
						}
					} //end foreach ($reject_trans_lines as $trans_line)
				}	
			}//end foreach ($reject_trans_headers as $trans_header_bean)
		}	
		
	}
	elseif($now_woop_bean->act_module == 'HAT_Asset_Trans_Batch'){
		reverse_asset($now_woop_bean->id, $wo_id, 1);
		/*$reject_trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $now_woop_bean->id . "'");
		foreach ($reject_trans_headers as $trans_header_bean) {
			$trans_header_bean->asset_trans_status = 'DRAFT'; //还原状态为拟定
			*/
		//如果当前回退到的工序是资产事务处理单，则需要把当前资产事务单还原到DRAFT
		$reject_asset_trans_headers = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list('', "hat_asset_trans_batch.source_wo_id ='" . $wo_id . "' and hat_asset_trans_batch.source_woop_id='" . $now_woop_bean->id . "'");

		if (isset($reject_asset_trans_headers)) {
			foreach ($reject_asset_trans_headers as $trans_header_bean) {
				//toney.wu 20170220 deleted - start
				//$trans_header_bean->deleted = 1;
				//toney.wu 20170220 deleted - end
				//toney.wu 20170220 added - start 原本是删除当前单据，需要需要变为将当前单据还原到DRAFT
				$trans_header_bean->asset_trans_status = 'DRAFT';
				//toney.wu 20170220 added - end
				$trans_header_bean->save();
				$reject_asset_trans_lines = BeanFactory :: getBean("HAT_Asset_Trans")->get_full_list('', "hat_asset_trans.batch_id ='" . $trans_header_bean->id . "'");

				if (isset($reject_asset_trans_lines)) {
					foreach ($reject_asset_trans_lines as $trans_line_bean) {
						//toney.wu 20170220 deleted - start
						//$trans_line_bean->deleted = 1;
						//toney.wu 20170220 deleted - end
						//toney.wu 20170220 added - start 原本是删除当前单据，需要需要变为将当前单据还原到DRAFT
						if ($trans_line_bean->trans_status == 'AUTO_TRANSACTED') {
							$trans_line_bean->deleted = 1;
						} else {
							$trans_line_bean->trans_status = 'DRAFT';
							$trans_line_bean->acctual_complete_date = null;
						}
						//toney.wu 20170220 added - end
						$trans_line_bean->save();
						//查找当前trans创建的rack_allocation，将其失效
						$dsql='SELECT * FROM hit_rack_allocations 
							WHERE create_by_hat_asset_trans_id ="'.$trans_line_bean->id.'"
							AND deleted = 0';
						$dsql_result = $db->query($dsql);
						while ($to_be_allocation = $db->fetchByAssoc($dsql_result)) {
							$d_update_sql='update hit_rack_allocations 
							set deleted=1, 
							date_end="'.$timedate->nowDB().'"
							where id="'.$to_be_allocation['id'].'"';
							$db->query($d_update_sql);
						}
						//查找当前trans失效的rack_allocation，将其恢复
						$csql='SELECT * FROM hit_rack_allocations 
								WHERE del_by_hat_asset_trans_id ="'.$trans_line_bean->id.'"
								AND deleted = 1';
						$csql_result = $db->query($csql);
						while ($to_be_allocation = $db->fetchByAssoc($csql_result)) {
							$c_update_sql='update hit_rack_allocations 
							set deleted=0 ,
							del_by_hat_asset_trans_id="",
							date_end = NULL
							where id="'.$to_be_allocation['id'].'"';
							$db->query($c_update_sql);
						}
					}
				}
			}
		}
		
	}
	//如果当前工序等于要退回的工序，则将工序状态赋成已审批，否则赋成 等待前序
	if($now_woop_bean->woop_number==$reject_woop_number){ 
		$now_woop_bean->woop_status = 'APPROVED';
		$now_woop_bean->date_actual_finish = '';
		$now_woop_bean->save();
	}else{
		$now_woop_bean->woop_status = 'WPREV';
		$now_woop_bean->date_actual_start = '';
		$now_woop_bean->date_actual_finish = '';
		$now_woop_bean->work_center_people_id = '';
		$now_woop_bean->work_center_people = '';
		$now_woop_bean->save();
		deleteTrans($wo_id,$now_woop_bean->id);
	}

}
if ($include_reject_wo==0){
	//将工单头状态进行还原
	$reject_wo_bean = BeanFactory :: getBean('HAM_WO', $wo_id);
	$reject_wo_bean->wo_status='RETURNED';
	$reject_wo_bean->save();
}


function deleteTrans($wo_id,$between_woop_id){

		echo '删除当前工序='.$between_woop_id.'的trans';
		//可能有多个事物处理单头
		$trans_headers = BeanFactory :: getBean('HIT_IP_TRANS_BATCH')->get_full_list('', "hit_ip_trans_batch.source_wo_id ='" . $wo_id . "' and hit_ip_trans_batch.source_woop_id='" . $between_woop_id . "'");
		//通过头找事物处理单行和分配行
		if (isset($trans_headers)) {
			foreach ($trans_headers as $trans_header_bean) {
				$trans_header_bean->deleted = 1;
				$trans_header_bean->save();
				$trans_lines = BeanFactory :: getBean("HIT_IP_TRANS")->get_full_list('', "hit_ip_trans.hit_ip_trans_batch_id ='" . $trans_header_bean->id . "'");
				foreach ($trans_lines as $trans_line_bean) {
					$trans_line_bean->deleted = 1;
					$trans_line_bean->save();
				}
			}
		}

		//可能有多个事物处理单头
		$asset_trans_headers = BeanFactory :: getBean('HAT_Asset_Trans_Batch')->get_full_list('', "hat_asset_trans_batch.source_wo_id ='" . $wo_id . "' and hat_asset_trans_batch.source_woop_id='" . $between_woop_id . "'");
		if (isset($asset_trans_headers)) {
			foreach ($asset_trans_headers as $trans_header_bean) {
				$trans_header_bean->deleted = 1;
				$trans_header_bean->save();
				$asset_trans_lines = BeanFactory :: getBean("HAT_Asset_Trans")->get_full_list('', "hat_asset_trans.batch_id ='" . $trans_header_bean->id . "'");
				if (isset($asset_trans_lines)) {
					foreach ($asset_trans_lines as $trans_line_bean) {
						$trans_line_bean->deleted = 1;
						$trans_line_bean->save();
					}
				}
			}
		}
}

function reverse_asset($woop_id, $wo_id, $include_reject_wo) {
	global $db,$timedate;
	//判断需要回退的资产事务处理
	//1 工序退回，0工单退回，通过SQL选出当前工单/工序涉及到最早的事务处理行记录，然后通过事务处理行记录的Current_XXX字段还原当前资产的信息。
	if ($include_reject_wo==0) {//退回到固定工序
		//0=工单退回，指到当前工单涉及到的所有资产，以及最早的事务处理行记录
		$changed_assets_sql =  'SELECT
							  hat.id hat_id, hat.*,
							  GROUP_CONCAT(DISTINCT hat.asset_id) asset_id_group
							FROM
							  hat_asset_trans hat,
							  hat_asset_trans_batch hatb,
							  ham_wo hw,
							  ham_woop hwoop
							WHERE hatb.id = hat.batch_id
							  AND hwoop.ham_wo_id = hw.id
							  AND hwoop.id = hatb.source_woop_id
							  AND (
							    hat.trans_status = "CLOSED"
							    OR hat.trans_status = "AUTO_TRANSACTED"
							  )
							  AND hw.id = "'.$wo_id.'"
							GROUP BY hat.asset_id
							ORDER BY hat.acctual_complete_date ASC';
	} else { ///1=工序退回，指到当前工单工序为止所涉及到的所有资产，以及最早的事务处理行记录
		$changed_assets_sql =  'SELECT
							  hat.id hat_id, hat.*,
							  GROUP_CONCAT(DISTINCT hat.`asset_id`) asset_id_group
							FROM
							  hat_asset_trans hat,
							  hat_asset_trans_batch hatb,
							  ham_wo hw,
							  ham_woop hwoop
							WHERE hatb.id = hat.`batch_id`
							  AND hat.deleted=0
							  AND hwoop.`ham_wo_id` = hw.id
							  AND hwoop.woop_number >= (
							  	SELECT  h.woop_number FROM ham_woop h WHERE h.id="'.$woop_id.'"
							  )
							  AND hwoop.id = hatb.`source_woop_id`
							  AND (
							    hat.`trans_status` = "CLOSED"
							    OR hat.`trans_status` = "AUTO_TRANSACTED"
							  )
							  AND hw.id = "'.$wo_id.'"
							GROUP BY hat.`asset_id`
							ORDER BY hat.`acctual_complete_date` ASC ';
	}

	//基于工序，找到所有变化的资产，注意：不同资产可能来源于多个工序，同一资产也可能在同一工序中发生变化，因此是找到最早的一个资产事务处理记录

		$changed_assets_result = $db->query($changed_assets_sql);

		while ($changed_asset_line = $db->fetchByAssoc($changed_assets_result)) {
			$changed_asset_bean = BeanFactory :: getBean('HAT_Assets', $changed_asset_line["asset_id"]);
			if ($changed_asset_bean) {
				//将资产用事务处理行中的Current信息进行还原
				$changed_asset_bean->using_org_id = $changed_asset_line['current_using_org_id'];
				$changed_asset_bean->using_person_id = $changed_asset_line['current_using_person_id'];
				$changed_asset_bean->using_person_desc = $changed_asset_line['current_using_person_desc'];
				$changed_asset_bean->cost_center_id = $changed_asset_line['current_cost_center_id'];
				$changed_asset_bean->asset_status = $changed_asset_line['current_asset_status'];
	            $changed_asset_bean->hat_asset_locations_hat_assetshat_asset_locations_ida = $changed_asset_line['current_location_id'];
	            $changed_asset_bean->location_desc = $changed_asset_line['current_location_desc'];
	            $changed_asset_bean->attribute9 = $changed_asset_line['current_asset_attribute9'];
	            $changed_asset_bean->attribute10 = $changed_asset_line['current_asset_attribute10'];
	            $changed_asset_bean->attribute11 = $changed_asset_line['current_asset_attribute11'];
	            $changed_asset_bean->attribute12 = $changed_asset_line['current_asset_attribute12'];
	            $changed_asset_bean->parent_asset_id = $changed_asset_line['current_parent_asset_id'];

				$changed_asset_bean->save();

				if ($changed_asset_bean->enable_it_ports==1) {

					//如果当前资产为IT设备则进一步判断当前IT设备对应的机柜分配信息
					//TODO：20170220 目前有一个BUG，就是只针对IT设备进行了还原，如果当前行不是IT设备只是占位，是无法将占位还原到没占之前的状态的。

					//处理过程如下
					//1、将当前资产的分配标记为失效
					//2、针对当前U位，看当前U位是否有预留的分配记录，并且不是针对当前资产的。
					//3、获取时间范围中的当前资产的最接近还原点的之前的分配记录
					//4、将第2步骤中获取的记录，创建为当前的新记录（也可能还原到没有分配的状态，也就是不创建新分配记录）

					//1/4：将当前资产的分配标记为失效
					//这里有个假设就是每个设备资产只能被分配一次，只有一个有效的记录（暂时不考虑可预定的情况），否则光有asset_id还不行，还需要有时间 判断，或者有状态判断才行
					/*echo ' 针对IT设备操作 ';
					$oldRackAllocation = BeanFactory::getBean('HIT_Rack_Allocations') ->retrieve_by_string_fields(array('hat_assets_id'=>$changed_asset_line["asset_id"]));
					if ($oldRackAllocation) {
						$oldRackPosTOP = $oldRackAllocation->rack_pos_top;
						$oldRackID = $oldRackAllocation->hit_racks_id;

						$oldRackAllocation->date_end = $timedate->nowDB();
						$oldRackAllocation->deleted = 1;
						$oldRackAllocation->save();


						//2/4、之前是针对当前资产，还需要再针对当前U位，看当前U位是否有预留的分配记录，并且不是针对当前资产的。
						$to_be_allocation_sql =  'SELECT * FROM hit_rack_allocations hra WHERE hra.hat_assets_id !="'.$changed_asset_line["asset_id"].'" AND hra.hit_racks_id = "'.$oldRackID.'" AND hra.rack_pos_top = "'.$oldRackPosTOP.'" AND hra.date_start<"'.$changed_asset_line['acctual_complete_date'].'" AND (hra.date_end IS NULL OR hra.date_end> "'.$changed_asset_line['acctual_complete_date'].'" ) ORDER BY hra.date_start DESC LIMIT 0,1';
						//找到最靠近事务处理时间的一行记录。注意这里搜索时并没有限制是否已经删除。因为之前的失效记录可能被删除
						$to_be_allocation_result = $db->query($to_be_allocation_sql);
						while ($to_be_allocation = $db->fetchByAssoc($to_be_allocation_result)) {
							$newRackAllocation = new HIT_Rack_Allocations();
    						$newRackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
						    $newRackAllocation->hit_racks_id = $to_be_allocation->hit_racks_id;
						    $newRackAllocation->name = $to_be_allocation->name;
						    $newRackAllocation->hat_assets_id = $to_be_allocation->hat_assets_id ;
						    $newRackAllocation->rack_pos_top = $to_be_allocation->rack_pos_top;
						    $newRackAllocation->height = $to_be_allocation->height;
						    $newRackAllocation->rack_pos_depth = $to_be_allocation->rack_pos_depth;
						    $newRackAllocation->sync_parent_enabled = true;
						    $newRackAllocation->placeholder = $to_be_allocation->placeholder;
						    $newRackAllocation->description = $to_be_allocation->description;
						    $newRackAllocation->using_org_id = $to_be_allocation->using_org_id;
						    $newRackAllocation->date_start = $timedate->nowDB();//同样这里也没有考虑按时间Book的情况，也就是没有时间重叠
						    $newRackAllocation->save();
						}

					} //end if ($oldRackAllocation)

					//3/4、获取时间范围中的分配记录
					$to_be_allocation_sql =  'SELECT * FROM hit_rack_allocations hra WHERE hra.hat_assets_id="'.$changed_asset_line["asset_id"].'" AND hra.date_start<="'.$changed_asset_line['acctual_complete_date'].'" AND (hra.date_end IS NULL OR hra.date_end> "'.$changed_asset_line['acctual_complete_date'].'" ) ORDER BY hra.date_start DESC LIMIT 0,1';
					//找到最靠近事务处理时间的一行记录。注意这里搜索时并没有限制是否已经删除。因为之前的失效记录可能被删除
					$to_be_allocation_result = $db->query($to_be_allocation_sql);
					while ($to_be_allocation = $db->fetchByAssoc($to_be_allocation_result)) {
						//4/4、将第2步骤中获取的记录，创建为当前的新记录
						//如果没有找到第2步中的有效记录，则说明没有分配，不再创建新记录。
						$newRackAllocation = new HIT_Rack_Allocations();
						$newRackAllocation = BeanFactory::getBean('HIT_Rack_Allocations');
					    $newRackAllocation->hit_racks_id = $to_be_allocation->hit_racks_id;
					    $newRackAllocation->name = $to_be_allocation->name;
					    $newRackAllocation->hat_assets_id = $to_be_allocation->hat_assets_id;
					    $newRackAllocation->rack_pos_top = $to_be_allocation->rack_pos_top;
					    $newRackAllocation->height = $to_be_allocation->height;
					    $newRackAllocation->rack_pos_depth = $to_be_allocation->rack_pos_depth;
					    $newRackAllocation->sync_parent_enabled = true;
					    $newRackAllocation->placeholder = false;
					    $newRackAllocation->description = $to_be_allocation->description;
					    $newRackAllocation->using_org_id = $to_be_allocation->using_org_id;
					    $newRackAllocation->date_start = $timedate->nowDB();//同样这里也没有考虑按时间Book的情况，也就是没有时间重叠
					    $newRackAllocation->save();
					}*/

				}

			}

		}
		//echo $changed_assets_sql."<hr/>";
 }


?>