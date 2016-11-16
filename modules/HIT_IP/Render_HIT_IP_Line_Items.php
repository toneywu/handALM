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
         	/*$sql = "SELECT
					  hit_ip_subnets.id,
					  hit_ip_subnets.`name`,
					  hit_ip_subnets.ip_subnet,
					  hit_ip_subnets.description,
					  hit_ip_subnets.tunnel,hit_ip_subnets.hit_vlan_id,hit_ip_subnets.vlan
					FROM
					  hit_ip,
					  hit_ip_subnets
					WHERE hit_ip.id = hit_ip_subnets.parent_hit_ip_id
					  AND hit_ip.id = '".$focus->id."'
					  AND hit_ip.`deleted` = 0
					  AND hit_ip_subnets.`deleted` = 0
					ORDER BY INET_ATON(hit_ip_subnets.`name`) ";//INET_ATON是为了让IP有正确的排序
*/
			$sql = "SELECT 
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
						  his.gateway,his.ip_type,his.purpose,h.name location
						FROM
						  `hit_ip_subnets` his 
						  LEFT JOIN hit_vlan hv 
							ON (his.hit_vlan_id = hv.id) 
						  LEFT JOIN accounts a 
							ON (his.org_id = a.id) 	
						  LEFT JOIN hat_asset_locations h
						  	ON (h.id=his.hat_asset_locations_id)	
						  INNER JOIN hit_ip hi 
							ON (hi.id = his.parent_hit_ip_id)
					  where hi.id = '".$focus->id."'
					  AND hi.`deleted` = 0
					  AND his.`deleted` = 0
					ORDER BY INET_ATON(his.`name`) ";//INET_ATON是为了让IP有正确的排序


         	$result = $focus->db->query($sql);

         	while ($row = $focus->db->fetchByAssoc($result)) {
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