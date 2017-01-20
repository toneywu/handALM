<?php


//TODO 目前还不能通过事务处理关联父资产，也不能由父资产联动的更新子资产
//global $current_user;

//****************** START: Save the header normally 写入头信息******************//
$sugarbean = new HIT_IP_TRANS_BATCH();
$sugarbean->retrieve($_POST['record']);

if (!$sugarbean->ACLAccess('Save')) { //确认访问权限
	ACLController :: displayNoAccess(true);
	sugar_cleanup(true);
}

if (!empty ($_POST['assigned_user_id']) && ($focus->assigned_user_id != $_POST['assigned_user_id']) && ($_POST['assigned_user_id'] != $current_user->id)) {
	$check_notify = TRUE; //如果指定了负责人，并且与当前录入人不同，就通知对应的人员进行处理。
} else {
	$check_notify = FALSE;
}
require_once ('include/formbase.php');
$sugarbean = populateFromPost('', $sugarbean); //调用populateFromPost写入POST的数据

$GLOBALS['log']->infor("Header Saved");
$sugarbean->save($check_notify);
$return_id = $sugarbean->id;

$GLOBALS['log']->debug("Saved HAT_Asset_Trans_Batch record with id of " . $return_id);
//****************** END: Save the header normally******************//

if (isset ($_REQUEST['duplicateSave']) && $_REQUEST['duplicateSave'] === "true") {
	$base_header_id = $_REQUEST['relate_id']; //复制一个记录
} else {
	$base_header_id = $sugarbean->id;
}

$transLine = array ();
/*
foreach($_POST as $key => $value){
    print_R($key."->".$value);
    echo "<br/>";
}
*/
save_lines($_POST, $sugarbean, 'line_');

$sugarbean->save(); //再调用一次，为了触发AfterSave,确认是否需要将头彻底关闭

handleRedirect($return_id, 'HIT_IP_TRANS_BATCH');

//****************** END: Jump Back *************************************************************//
function save_lines($post_data, $parent, $key = '') {
	$line_count = isset ($post_data[$key . 'hit_ip_subnets_id']) ? count($post_data[$key . 'hit_ip_subnets_id']) : 0; //判断记录的行数
	$insertFlag = "N";
	$prev_trans_batch_id = "";
	echo '<br/>.line_count = ' . $line_count;
	echo '<br/>.$parent.id = ' . $parent->id;

	//echo var_dump($post_data);
	for ($i = 0; $i < $line_count; ++ $i) {
		//echo "<br/>line ".$i." processed;";
		echo "<br/>hit_ip_subnets_id=" . $post_data[$key . 'hit_ip_subnets_id'][$i];
		echo "<br/>line_parent_ip=" . $post_data[$key . 'line_parent_ip'][$i];
		echo "<br/>hat_asset_locations_id=" . $post_data[$key . 'hat_asset_locations_id'][$i];
		echo 'id=' . $post_data[$key . 'id'][$i] . "<br>";

		if ($post_data[$key . 'hit_ip_subnets_id'][$i] != '') {
			//只保存Asset、Account、Location不为空的记录，否则直接到下一循环
			if ($post_data[$key . 'deleted'][$i] == 1) { //删除行
				echo "<br/>----------->line deleted";
				$trans_line = new HIT_IP_TRANS();
				$trans_line->retrieve($post_data[$key . 'id'][$i]);
				echo 'delete_id = ' . $post_data[$key . 'id'][$i] . "<br>";
				$trans_line->mark_deleted($post_data[$key . 'id'][$i]);
			} else { //新增或修改行

				if ($post_data[$key . 'id'][$i] == '') { //新增行
					echo "<br/>----------->line added";
					//$GLOBALS['log']->infor($post_data);
					$trans_line = new HIT_IP_TRANS();
					$trans_line = BeanFactory :: getBean('HIT_IP_TRANS');
					$insertFlag = 'Y';
				} else { //修改行
					echo "<br/>----------->line updated";
					$trans_line = new HIT_IP_TRANS();
					$trans_line->retrieve($post_data[$key . 'id'][$i]);
					$insertFlag = 'N';
					$prev_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
					echo "prev_trans_batch_id=" . $prev_trans_batch_id;
				}
				foreach ($trans_line->field_defs as $field_def) { //循环对所有要素
					//echo "value = ".$post_data[$key.'hit_ip_ida'][$i]."<br>";
					//echo "field_name= " . $field_def['name'] . "--------------------value = " . $post_data[$key . $field_def['name']][$i] . "<br>";
					$trans_line-> $field_def['name'] = $post_data[$key . $field_def['name']][$i];
					//echo "<br/>" . $field_def[name] . '=' . $post_data[$key . $field_def['name']][$i];
					$trans_line->enable_action = $post_data[$key . 'enable_action_val'][$i];
				}
				if ($insertFlag == "Y") {
					$trans_line->hit_ip_trans_batch_id = $parent->id; //父ID
				}

				$trans_line->trans_status = $parent->asset_trans_status; //父状态 LogicHook BeforeSave可能会改写

			}
			//$trans_line->assigned_user_id = $parent->assigned_user_id;

			//echo("$parent->id=".$parent->id;);
			//echo("$parent->assigned_user_id".$parent->assigned_user_id;);

			$trans_line->save();
			$GLOBALS['log']->infor("transLine Saved");

			if ($parent->asset_trans_status == "CLOSED") {
				$GLOBALS['log']->infor("allocation Lines Begin to process");
				save_allocation_lines($trans_line, $parent, $prev_trans_batch_id);
				$GLOBALS['log']->infor("End to process Allocation Lines");
			}
		} else {
			//empty line jumped
		}

	}
}

function save_allocation_lines($trans_line_bean, $parent, $prev_trans_batch_id) {
	/**
	 * 循环所有网络事务处理行
	 */
	global $db;
	$trans_line = new HIT_IP_TRANS();
	$trans_line->retrieve($trans_line_bean->id);
	/*if (!empty ($trans_line->history_id)) {
		//1 尝试获取 
		$allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
			'source_trans_id' => $trans_line->id
		));
		//2 获取不到就new一个对象
		if ($allocation_line_bean->source_trans_id == null) {
			$allocation_line_bean = BeanFactory :: newBean("HIT_IP_Allocations");
		}
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
		if ($allocation_line_bean->source_trans_id == null) {
			$allocation_line_bean->hit_ip_trans_batch_id = $trans_line->hit_ip_trans_batch_id;
			$allocation_line_bean->source_trans_id = $trans_line->id;
			$allocation_line_bean->source_wo_id = $parent->source_wo_id;
			$allocation_line_bean->source_woop_id = $parent->source_woop_id;
		}
		//事物处理单行行上面存历史表id
		$trans_line->history_id = $allocation_line_bean->id;
		$allocation_line_bean->save();

	}
	
	echo "然后通过 ip和端口去找历史表 看是否存在 如果不存在需要新建  "."<br>";
	echo "subnets_id = ".$trans_line_bean->hit_ip_subnets_id."<br>";
	*/
	
		if (!empty($trans_line->history_id)) {
			//更新
			echo "allocation update";
			   $allocation_line_bean = BeanFactory :: getBean('HIT_IP_Allocations')->retrieve_by_string_fields(array (
												'id' => $trans_line->history_id));		
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
				$allocation_line_bean->save();	
				//事物处理单行行上面存历史表id
				$trans_line->history_id = $allocation_line_bean->id;
				$trans_line->save();
				
															
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
			$allocation_line_bean->save();
			//事物处理单行行上面存历史表id
			$trans_line->history_id = $allocation_line_bean->id;
			$trans_line->save();
			
			
		}

}
?>