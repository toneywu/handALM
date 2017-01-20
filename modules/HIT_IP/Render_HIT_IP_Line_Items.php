<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView' || $view == 'DetailView'){
		$html .= '<script src="modules/HIT_IP_Subnets/js/subnet_line_items.js"></script>';
		/**
		 * 解决编辑取消后 detailView不能正确加载外部js库
		 */
		$html .= '<script src="custom/resources/IPSubnetCalculator/lib/ip-subnet-calculator.js"></script>';
		$html .= "<table border='0' cellspacing='4' id='lineItems' class='list view table'></table>";
		$html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录,或是显示已有记录）

/*			$sql = "SELECT 
						  his.id,
						  his.`name`,
						  his.ip_subnet,
						  his.description,
						  his.tunnel,
						  his.hat_asset_locations_id hat_asset_locations_id,
						  his.hit_vlan_id vlan_id,
						  hv.name vlan,
						  his.org_id,
						  a.name org,
						  his.gateway,
						  his.ip_type,
						  his.purpose,
						  h.name location,
						   COUNT(hiaa.id) allo_qty 
						FROM
						  `hit_ip_subnets` his 
						  LEFT JOIN hit_vlan hv 
							ON (his.hit_vlan_id = hv.id) 
						  LEFT JOIN accounts a 
							ON (his.org_id = a.id) 	
						  LEFT JOIN ham_maint_sites h
						  	ON (h.id=his.hat_asset_locations_id)
						  LEFT JOIN hit_ip_allocations hiaa 
							ON ( hiaa.id IN 
								(SELECT hia.id FROM hit_ip_allocations hia WHERE (hia.accurate_ip = his.id OR hia.hit_ip_subnets_id = his.id) AND hia.`deleted`=0 AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE()) AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE()) LIMIT 0,1)
								)
						  INNER JOIN hit_ip hi 
							ON (hi.id = his.parent_hit_ip_id)
					  where hi.id = '".$focus->id."'
					  AND hi.`deleted` = 0
					  AND his.`deleted` = 0
					ORDER BY INET_ATON(his.`name`) ";//INET_ATON是为了让IP有正确的排序*/
					//20161214 Replaced by toney.wu
		$sql = "SELECT
						  his.id,
						  his.`name`,
						  his.ip_subnet,
						  his.description,
						  his.tunnel,
						  his.hat_asset_locations_id hat_asset_locations_id,
						  his.hit_vlan_id vlan_id,
						  hv.name vlan,
						  a.id org_id,
						  a.name org,
						  hiaa.id hiaa_id,
						  hiaa.`gateway`,
						  his.ip_type,
						  his.purpose,
						  h.name location,
						  ha_access.`id` access_asset_id,
						  ha_access.`name` access_asset_name,
						  ha_mont.id mont_asset_id,
						  ha_mont.name mont_asset_name,
						  hiaa.`port`,
						  hiaa.`speed_limit`,
						  hiaa.`source_wo_id` source_id,
						  IFNULL((SELECT 
								a.name
							  FROM
								hit_ip_allocations hi,
								accounts a 
							  WHERE hi.target_owning_org_id = a.`id` 
								AND hi.hit_ip_subnets_id = his.id 
								AND hi.`deleted` = 0 
								and hi.enable_action=1
							  LIMIT 0, 1),'')using_org 
						FROM
						  `hit_ip_subnets` his
						  LEFT JOIN hit_vlan hv
							ON (his.hit_vlan_id = hv.id)
						  LEFT JOIN ham_maint_sites h
						  	ON (h.id=his.hat_asset_locations_id)
						  LEFT JOIN hit_ip_allocations hiaa 
							ON ( hiaa.id =
								(SELECT hia.id FROM hit_ip_allocations hia WHERE (hia.accurate_ip = his.id OR hia.hit_ip_subnets_id = his.id) AND hia.`deleted`=0 AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE()) AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE()) LIMIT 0,1)
								)
						  LEFT JOIN accounts a 
							ON (hiaa.`account_id` = a.id) 
						  LEFT JOIN hat_assets ha_access
							ON (hiaa.`access_assets_id`=ha_access.id)
						  LEFT JOIN hat_assets ha_mont
							ON (hiaa.`monitoring`=ha_access.id)
							,
							hit_ip hi
					  WHERE hi.id = '".$focus->id."'
					  AND hi.id = his.parent_hit_ip_id
					  AND hi.`deleted` = 0
					  AND his.`deleted` = 0
					ORDER BY INET_ATON(his.`name`)";//INET_ATON是为了让IP有正确的排序*/



         	$result = $focus->db->query($sql);
         	while ($row = $focus->db->fetchByAssoc($result)) {
         		/*$line_sql = "SELECT count(*) num FROM hit_ip_allocations h WHERE h.hit_ip_subnets_id = '".$row['id']."'";*/
         		$line_sql = "SELECT count(*) num FROM hit_ip_allocations hia WHERE (hia.accurate_ip = '".$row['id']."' OR hia.hit_ip_subnets_id = '".$row['id']."') AND hia.`deleted`=0 AND (hia.`date_from`='' OR hia.`date_from` IS NULL OR hia.date_from>=CURDATE()) AND (hia.`date_to`='' OR hia.`date_to` IS NULL OR hia.`date_to`<=CURDATE())";
         		//var_dump($line_sql);
         		$res = $focus->db->query($line_sql);
         		$row_res = $focus->db->fetchByAssoc($res);
         		if ($row_res['num']>0) {
         			$row['allo_qty']='1';
         		}else{
         			$row['allo_qty']='';
         		}
         		//var_dump($row['allo_qty']);
         		$line_data = json_encode($row);
         		$html .= "<script>insertLineData(" . $line_data . ",'".$view."');</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
         	}
         }
    	//在编辑模式下显示按钮
    	if ($view == 'EditView') {
        	$html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
		}
        return $html;

     }
 }