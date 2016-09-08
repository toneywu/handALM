<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;

    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HAT_Asset_Trans/js/line_items.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        $html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT 
						hat.id,
						hat.name line_name,
						ha.name asset_name,
						ha.id asset_id,
						hat.target_asset_status,
						hat.contact_id_c target_contact_id,
						hal.name target_location_name,
						hat.hat_asset_locations_id target_location_id,
						hat.target_location_desc,
						hat.current_asset_status,
						hat.current_location,
						hat.current_location_desc,
						hat.owning_org_id,
						a.name owning_org,
						hat.using_org_id,
						acc_u.name using_org,
						hat.owning_person_id,
						ctc_o.last_name owning_person,
						hat.using_person_id,
						ctc_u.last_name using_persoon
					FROM
						hat_asset_trans hat
							LEFT JOIN
						contacts ctc_o ON (ctc_o.id = hat.owning_person_id AND ctc_o.`deleted`=0)
							LEFT JOIN
						contacts ctc_u ON (ctc_u.id = hat.using_person_id AND ctc_u.`deleted`=0)	
							LEFT JOIN
						accounts acc_u ON (acc_u.id= hat.`using_org_id` AND acc_u.`deleted`=0),

						hat_asset_trans_batch_hat_asset_trans_c hat_b,
						hat_assets ha,
						hat_assets_hat_asset_trans_c hat_ha,
						accounts a,
						hat_asset_locations hal
					WHERE
						hat.hat_asset_locations_id = hal.id
							AND hat.owning_org_id = a.id
							AND hat.deleted=0
							AND hat_ha.hat_assets_hat_asset_transhat_asset_trans_idb = hat.id
							AND hat_ha.hat_assets_hat_asset_transhat_assets_ida = ha.id
							AND hat.id = hat_b.hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb
							AND hat_b.hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida ='".$focus->id."'";

            $result = $focus->db->query($sql);

		while ($row = $focus->db->fetchByAssoc($result)) {
			$line_data = json_encode($row);
			$html .= "<script>insertLineData(" . $line_data . ");</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
		}
      }
	  
	  $html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
    }
    else if($view == 'DetailView'){
	}
    return $html;
}