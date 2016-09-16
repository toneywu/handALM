<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;

    echo '<script>var hat_asset_status_list = [';
    foreach (translate('hat_asset_status_list') as $key => $value) {
    	echo "{name:'".$key."',value:'".$value."'},";
    }
    echo ']</script>';

    //以下开始处理行显示相关的内容
    $html = '';
    if($view == 'EditView' || $view == 'DetailView'){
        $html .= '<script src="modules/HAT_Asset_Trans/js/line_items.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        $html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT 
					  hat.id,
					  hat.name name,
					  ha.name asset,
					  ha.id asset_id,
					  hat.current_asset_status,
					  hat.target_asset_status,
					  location_t.name target_location,
					  location_t.id target_location_id,
					  location_c.`name` current_location,
					  location_c.id current_location_id,
					  hat.target_location_desc,
					  hat.current_location_desc,
					  hat.target_using_person_desc,
					  hat.target_owning_person_desc,
					  hat.current_using_person_desc,
					  hat.current_owning_person_desc,
					  using_org_c.`name` current_using_org,
					  using_org_c.id current_using_org_id,
					  owning_org_c.`name` current_owning_org,
					  owning_org_c.id current_owning_org_id,
					  using_org_t.`name` target_using_org,
					  using_org_t.id target_using_org_id,
					  owning_org_t.`name` target_owning_org,
					  owning_org_t.id target_owning_org_id,
					  using_person_t.`last_name` target_using_person,
					  using_person_t.id target_using_person_id,
					  owning_person_t.`last_name` target_owning_person,
					  owning_person_t.id target_owning_person_id,
					  using_person_c.`last_name` current_using_person,
					  using_person_c.id current_using_person_id,
					  owning_person_c.`last_name` current_owning_person,
					  owning_person_c.id current_owning_person_id,
					  p_asset_c.id current_parent_asset_id,
					  p_asset_c.name current_parent_asset, 
					  p_asset_t.id target_parent_asset_id,
					  p_asset_t.name target_parent_asset
					FROM
					  hat_asset_trans hat 
					  LEFT JOIN hat_asset_locations location_c 
					    ON (
					      location_c.id = hat.`current_location_id` 
					      AND location_c.`deleted` = 0
					    ) 
					  LEFT JOIN hat_asset_locations location_t 
					    ON (
					      location_t.id = hat.hat_asset_locations_id 
					      AND location_t.`deleted` = 0
					    ) 
					  LEFT JOIN accounts using_org_c 
					    ON (
					      using_org_c.id = hat.current_using_org_id 
					      AND using_org_c.`deleted` = 0
					    ) 
					  LEFT JOIN accounts owning_org_c 
					    ON (
					      owning_org_c.id = hat.current_owning_org_id 
					      AND owning_org_c.`deleted` = 0
					    ) 
					  LEFT JOIN accounts using_org_t 
					    ON (
					      using_org_t.id = hat.`using_org_id` 
					      AND using_org_t.`deleted` = 0
					    ) 
					  LEFT JOIN accounts owning_org_t 
					    ON (
					      owning_org_t.id = hat.`owning_org_id` 
					      AND owning_org_t.`deleted` = 0
					    ) 
					  LEFT JOIN contacts using_person_t 
					    ON (
					      using_person_t.id = hat.`target_using_person_id` 
					      AND using_person_t.`deleted` = 0
					    ) 
					  LEFT JOIN contacts owning_person_t 
					    ON (
					      owning_person_t.id = hat.`target_owning_person_id` 
					      AND owning_person_t.`deleted` = 0
					    ) 
					  LEFT JOIN contacts using_person_c 
					    ON (
					      using_person_c.id = hat.`current_using_person_id` 
					      AND using_person_c.`deleted` = 0
					    ) 
					  LEFT JOIN contacts owning_person_c 
					    ON (
					      owning_person_c.id = hat.`current_owning_person_id` 
					      AND owning_person_c.`deleted` = 0
					    )
					  LEFT JOIN hat_assets p_asset_c
					    ON (
					      p_asset_c.id = hat.`current_parent_asset_id` 
					      AND p_asset_c.`deleted` = 0
					    )
					  LEFT JOIN hat_assets p_asset_t
					    ON (
					      p_asset_t.id = hat.target_parent_asset_id 
					      AND p_asset_t.`deleted` = 0
					    ),
					  hat_asset_trans_batch_hat_asset_trans_c hat_b,
					  hat_assets ha,
					  hat_assets_hat_asset_trans_c hat_ha 
					WHERE hat.deleted = 0 
					  AND hat_ha.hat_assets_hat_asset_transhat_asset_trans_idb = hat.id 
					  AND hat_ha.hat_assets_hat_asset_transhat_assets_ida = ha.id 
					  AND hat.id = hat_b.hat_asset_trans_batch_hat_asset_transhat_asset_trans_idb 
							AND hat_b.hat_asset_trans_batch_hat_asset_transhat_asset_trans_batch_ida ='".$focus->id."'";
							
            $result = $focus->db->query($sql);

        $html .= "<script>$(document).ready(function(){
";
		while ($row = $focus->db->fetchByAssoc($result)) {
			$line_data = json_encode($row);
			$html .= "insertLineData(" . $line_data .",'".$view."');";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
		}
        $html .= "})</script>";
      }

      if($view == 'EditView') {
	  	$html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
	  }
    }
/*    else if(){
	}
*/    return $html;
}