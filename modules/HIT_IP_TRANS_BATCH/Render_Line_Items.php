<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;
	
    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HIT_IP_TRANS/js/line_items.js"></script>';
        $html .= "<table border='0' id='lineItems' class='list view table'></table>";
        $html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT   hat.id
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
					FROM   hit_ip_trans hat
					LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
					LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
					LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
					LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
					WHERE hat.hit_ip_trans_batch_id ='".$focus->id."'";

            $result = $focus->db->query($sql);
			
		while ($row = $focus->db->fetchByAssoc($result)) {
			//echo var_dump($row);;
			$line_data = json_encode($row);
			$html .= "<script>insertLineData(" . $line_data . ");</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
		}
      }
	  
	  $html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
    }
    else if($view == 'DetailView'){
    	$html .= '<script src="modules/HIT_IP_TRANS/js/line_items_show.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        $html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT   hat.id
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
					FROM   hit_ip_trans hat
					LEFT JOIN hat_assets a ON (hat.hat_assets_id=a.id)
					LEFT JOIN hat_assets b ON (hat.hat_assets_cabinet_id=b.id)
					LEFT JOIN hit_ip_subnets s ON (hat.hit_ip_subnets_id=s.id)
					LEFT JOIN hit_ip hi ON (s.parent_hit_ip_id=hi.id)
					WHERE hat.hit_ip_trans_batch_id ='".$focus->id."'";

            $result = $focus->db->query($sql);
			
		while ($row = $focus->db->fetchByAssoc($result)) {
			//echo var_dump($row);;
			$line_data = json_encode($row);
			$html .= "<script>insertLineData(" . $line_data . ");</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
		}
      }
	  $html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
    	
	}
    return $html;
}