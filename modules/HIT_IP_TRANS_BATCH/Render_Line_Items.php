<?php
function display_lines($focus, $field, $value, $view) {

	global $sugar_config, $locale, $app_list_strings, $mod_strings;


	$html = '';
	$html .= '<script src="modules/HIT_IP_TRANS_BATCH/js/html_dom_required_setting.js"></script>';
	if ($view == 'EditView') {
		$html .= '<script src="modules/HIT_IP_TRANS/js/line_items.js"></script>';
		//$html .= '<script src="modules/HAA_FF/ff_include.js"></script>';
		$html .= '<script src="custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js"></script>';
		$html .= "<table border='0' id='lineItems' class='list view table'></table>";
		$html .= '<script>insertTransLineHeader(\'lineItems\');</script>';
		$html .= "<script> var lineData='';</script>";

		
		/*$sql2 = "(SELECT   hat.source_trans_id id
							        ,a.name hat_asset_name,a.id hat_assets_id
							        ,s.name hit_ip_subnets
							        ,s.id   hit_ip_subnets_id
							        ,hi.name parent_ip
							        ,hat.associated_ip
							        ,null mask
							        ,hat.bandwidth_type
							        ,hat.port
							        ,hat.speed_limit
							        ,hat.gateway
									,hat.monitoring
									,hat.hat_assets_cabinet_id
									,b.name hat_assets_cabinet
									,hat.channel_content
									,hat.channel_num
									,s.ip_netmask
									,s.ip_lowest+'~'+ s.ip_highest associated_ip
									,hat.mrtg_link
									,hat.access_assets_id
									,c.name access_assets_name 	
									,'OTHER_WOOP' source_ref,
									hat.date_entered,
									hat.access_assets_backup_id,
									d.name access_assets_backup_name
									,hat.status,hat.port_backup
									,hat.monitoring_backup
									,hat.channel_content_backup
									,hat.channel_num_backup
									,ifnull(hat.date_start,'') date_start
									,ifnull(hat.date_end,'') date_end,hat.status,hat.enable_action,hat.broadband_type
							FROM   hit_ip_allocations hat
							LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
							LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
							LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
							LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
							LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
							LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
							WHERE hat.deleted=0 and hat.hit_ip_trans_batch_id !='" . $focus->id . "' and hat.source_wo_id='" .
								$focus->source_wo_id . "' and hat.source_woop_id!='" .
								$focus->source_woop_id . "')";*/
			//找到上一笔工序对应得事物处理单
			$last_trans_sql ='SELECT 
									hitb.id 
								  FROM
									hit_ip_trans_batch hitb 
								  WHERE hitb.source_wo_id = "'.$focus->source_wo_id.'"
								  and   hitb.source_woop_id!="'.$focus->source_woop_id.'"
								  ORDER BY hitb.date_entered asc
								  limit 0,1';
			$last_trans_result = $focus->db->query($last_trans_sql);

			while ($last_trans = $focus->db->fetchByAssoc($last_trans_result)) {
				$last_trans_id= $last_trans["id"];
			}
			
			
			
			$sql2 = "(SELECT   '1' id
							        ,a.name hat_asset_name,a.id hat_assets_id
							        ,s.name hit_ip_subnets
							        ,s.id   hit_ip_subnets_id
							        ,hi.name parent_ip
							        ,hat.associated_ip
							        ,null mask
							        ,hat.bandwidth_type
							        ,hat.port
							        ,hat.speed_limit
							        ,hat.gateway
									,hat.monitoring
									,hat.hat_assets_cabinet_id
									,b.name hat_assets_cabinet
									,hat.channel_content
									,hat.channel_num
									,s.ip_netmask
									,s.ip_lowest+'~'+ s.ip_highest associated_ip
									,hat.mrtg_link
									,hat.access_assets_id
									,c.name access_assets_name 	
									,'OTHER_WOOP' source_ref,
									hat.date_entered,
									hat.access_assets_backup_id,
									d.name access_assets_backup_name
									,hat.status,hat.port_backup
									,hat.monitoring_backup
									,hat.channel_content_backup
									,hat.channel_num_backup
									,ifnull(hat.date_start,'') date_start
									,ifnull(hat.date_end,'') date_end,hat.status,hat.enable_action,hat.broadband_type,hat.child_port,hat.vlan_channel,hat.history_id
							FROM   hit_ip_trans hat
							LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
							LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
							LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
							LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
							LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
							LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
							LEFT JOIN hit_ip_trans_batch h ON (h.id = hat.hit_ip_trans_batch_id) 
							WHERE hat.deleted=0 and hat.hit_ip_trans_batch_id !='" . $focus->id . "' and h.source_wo_id='" .
								$focus->source_wo_id . "' and h.source_woop_id!='" .
								$focus->source_woop_id . "'  and hat.hit_ip_trans_batch_id ='".$last_trans_id."') ";

		if ($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql1 = "(SELECT   hat.id
					        ,a.name hat_asset_name,a.id hat_assets_id
					        ,s.name hit_ip_subnets
					        ,s.id   hit_ip_subnets_id
					        ,hi.name parent_ip
					        ,hat.associated_ip
					        ,hat.mask
					        ,hat.bandwidth_type
					        ,hat.port
					        ,hat.speed_limit
					        ,hat.gateway
							,hat.monitoring
							,hat.hat_assets_cabinet_id
							,b.name hat_assets_cabinet
							,hat.channel_content
							,hat.channel_num
							,s.ip_netmask
							,s.ip_lowest + '~' + s.ip_highest associated_ip
							,hat.mrtg_link
							,hat.access_assets_id
							,c.name access_assets_name
							,'CURRENT_WOOP' source_ref
							,hat.date_entered
							,hat.access_assets_backup_id
							,d.name access_assets_backup_name
							,hat.status,hat.port_backup
							,hat.monitoring_backup
							,hat.channel_content_backup
							,hat.channel_num_backup
							,ifnull(hat.date_start,'') date_start
							,ifnull(hat.date_end,'') date_end ,hat.status,hat.enable_action,hat.broadband_type,hat.child_port,hat.vlan_channel,hat.history_id
					FROM   hit_ip_trans hat
					LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
					LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
					LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
					LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
					LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
					LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
					WHERE hat.deleted=0 and hat.hit_ip_trans_batch_id ='" . $focus->id . "')";
			//$sql = $sql1 . " union all (" . $sql2 . ") order by date_entered asc";
			$result = $focus->db->query($sql1);

			while ($row = $focus->db->fetchByAssoc($result)) {
				//echo var_dump($row);;
				$line_data = json_encode($row);
				$html .= "<script>var lineDataTemp=" . $line_data . ";</script>";
				$html .= "<script>var lineData=" . $line_data . ";</script>";
				$html .= "<script>insertLineData(" . $line_data . ");</script>";
			}
		} else {

			$result = $focus->db->query($sql2);

			while ($row = $focus->db->fetchByAssoc($result)) {
				$line_data = json_encode($row);
				$html .= "<script>var lineDataTemp=" . $line_data . ";</script>";
				$html .= "<script>var lineData=" . $line_data . ";</script>";
				$html .= "<script>insertLineData(" . $line_data . ");</script>";
			}

		}

		$html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
		$html .= '<script>resetLineNum_Bold();</script>';

	} else
		if ($view == 'DetailView') {

			$html .= '<script src="modules/HIT_IP_TRANS/js/line_items_show.js"></script>';
			$html .= '<script src="custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js"></script>';
			$html .= "<table border='0' cellspacing='16' width='37.5%' id='lineItems' class='list view table'></table>";
			$html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

			if ($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
				$sql1 = "(SELECT   hat.id
						        ,a.name hat_asset_name
						        ,s.name hit_ip_subnets
						        ,s.id   hit_ip_subnets_id
						        ,hi.name parent_ip
						        ,hat.associated_ip
						        ,hat.mask
						        ,hat.bandwidth_type
						        ,hat.port
						        ,hat.speed_limit
						        ,hat.gateway
								,hat.monitoring
								,hat.hat_assets_cabinet_id
								,b.name hat_assets_cabinet
								,hat.channel_content
								,hat.channel_num
								,s.ip_netmask
								,s.ip_lowest+'~'+ s.ip_highest associated_ip
								,hat.mrtg_link
								,hat.access_assets_id
								,c.name access_assets_name
								,hat.date_entered
								,hat.access_assets_backup_id
								,d.name access_assets_backup_name
								,hat.status,hat.port_backup
								,hat.monitoring_backup
								,hat.channel_content_backup
								,hat.channel_num_backup
								,ifnull(hat.date_start,'') date_start
								,ifnull(hat.date_end,'') date_end,hat.status,hat.enable_action,hat.broadband_type,hat.child_port,hat.vlan_channel,hat.history_id
						FROM   hit_ip_trans hat
						LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
						LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
						LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
						LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
						LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
						LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
						WHERE hat.deleted=0 and  hat.hit_ip_trans_batch_id ='" . $focus->id . "')";
				/**add by yuan.chen 2016-09-12
					* 来源于网络事务处理分配行
					*/
				/*$sql2 = "(SELECT hat.id
						        ,a.name hat_asset_name
						        ,s.name hit_ip_subnets
						        ,s.id   hit_ip_subnets_id
						        ,hi.name parent_ip
						        ,hat.associated_ip
						        ,null mask
						        ,hat.bandwidth_type
						        ,hat.port
						        ,hat.speed_limit
						        ,hat.gateway
								,hat.monitoring
								,hat.hat_assets_cabinet_id
								,b.name hat_assets_cabinet
								,hat.channel_content
								,hat.channel_num
								,s.ip_netmask
								,s.ip_lowest+'~'+ s.ip_highest associated_ip
								,hat.mrtg_link,hat.access_assets_id
								,c.name access_assets_name
								,hat.date_entered
								,hat.access_assets_backup_id
								,d.name access_assets_backup_name
								,hat.status,hat.port_backup
								,hat.monitoring_backup
								,hat.channel_content_backup
								,hat.channel_num_backup
								,ifnull(hat.date_start,null) date_start,hat.enable_action
								,ifnull(hat.date_end,'') date_end,hat.status,hat.broadband_type
						FROM   hit_ip_allocations hat
						LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
						LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
						LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
						LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
						LEFT JOIN hat_assets c ON (hat.access_assets_id=c.id)
						LEFT JOIN hat_assets d ON (hat.access_assets_backup_id=d.id)
						
						WHERE hat.deleted=0 and hat.hit_ip_trans_batch_id !='" . $focus->id . "'" . " and     
						 hat.source_wo_id='" .
				$focus->source_wo_id . "' and hat.source_woop_id!= '" .
				$focus->source_woop_id . "') ";*/
				//$sql = $sql1 . " union all " . $sql2 . " order by date_entered asc";
				$result = $focus->db->query($sql1);

				while ($row = $focus->db->fetchByAssoc($result)) {
					$line_data = json_encode($row);
					$html .= "<script>insertLineData(" . $line_data . ");</script>";
				}
				//end by yuan.chen	
			}
			$html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
			$html .= '<script>resetLineNum_Bold();</script>';

		}

	if (isset($focus->hat_eventtype_id) && $focus->hat_eventtype_id != '') {

		$event_sql = "SELECT 
			  h.change_ip_subnets,
			  h.change_associated_ip,
			  h.change_gateway,
			  h.change_bandwidth_type,
			  h.change_port,
			  h.change_speed_limit,
			  h.change_asset,
			  h.change_cabinet,
			  h.change_monitoring,
			  h.change_channel_num,
			  h.change_channel_content,
			  h.change_mrtg_link,
			  h.change_access_assets_name ,
			  h.change_date_end
			  ,h.change_date_start
			  ,h.change_port_backup
			  ,h.change_monitoring_backup
			  ,h.change_channel_content_backup
			  ,h.change_channel_num_backup
			  ,h.change_status,h.change_access_assets_backup_name,h.change_enable_action,h.change_broadband_type,h.change_child_port,h.change_vlan_channel
			FROM
			  hat_eventtype h 
			WHERE h.deleted = 0 
		    AND   h.id ='" . $focus->hat_eventtype_id . "'";
		$event_result = $focus->db->query($event_sql);
		while ($event_row = $focus->db->fetchByAssoc($event_result)) {
			$event_line_data = json_encode($event_row);
			$html .= "<script> var lineData=" . $event_line_data . ";</script>";
			$html .= "<script>changeRequired(" . $event_line_data . ");</script>";

		}
	}
	return $html;
}