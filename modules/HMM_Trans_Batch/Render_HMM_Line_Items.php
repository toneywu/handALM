<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView' || $view == 'DetailView'){
		$html .= '<script src="modules/HMM_Trans_Lines/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' id='lineItems' class='list view table'></table>";
		$html .= '<script>insertTransLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
	         	hmm_trans_lines.id,
	         	hmm_trans_lines.name,
	         	hmm_trans_lines.description,
	         	hmm_trans_lines.trans_date,
	         	hmm_trans_lines.primary_qty,
	         	hmm_trans_lines.secondary_qty,
	         	aos_products.id product_id,
	         	aos_products.name product_name,
	         	aos_products_cstm.secondary_unit_defaulting_c,
	         	aos_products_cstm.tracking_uom_c,
	         	haa_uom.name uom1,
	         	uom2.name uom2,
	         	haa_uom.id uom1_id,
	         	uom2.id uom2_id,
	         	from_location.name from_location,
	         	from_location.id from_location_id,
	         	from_location.inventory_mode from_location_mode,
	         	to_location.name to_location,
	         	to_location.id to_location_id,
	         	to_location.inventory_mode to_location_mode,
	         	from_locator.name from_locator,
	         	to_locator.name to_locator,
	         	from_locator.id from_locator_id,
	         	to_locator.id to_locator_id,
	         	ham_wo.name wo_name,
	         	ham_woop.name woop_name,
	         	ham_wo.id wo_id,
	         	ham_woop.id woop_id,
	         	(hmm_trans_lines.secondary_qty/hmm_trans_lines.primary_qty) uom_conversion
         	FROM
	         	aos_products,
	         	aos_products_cstm,
	         	haa_uom,
	         	hmm_trans_lines
	         	LEFT JOIN
	         	(haa_uom uom2) ON (uom2.id = hmm_trans_lines.secondary_uom_id
	         		AND uom2.deleted = 0)
	         	LEFT JOIN
	         	(hat_asset_locations from_location) ON (from_location.id = hmm_trans_lines.from_location_id
	         		AND from_location.deleted = 0)
	         	LEFT JOIN
	         	(hat_asset_locations to_location) ON (to_location.id = hmm_trans_lines.to_location_id
	         		AND to_location.deleted = 0)
	         	LEFT JOIN
	         	(hmm_locators from_locator) ON (from_locator.id = hmm_trans_lines.from_locator_id
	         		AND from_locator.deleted = 0)
	         	LEFT JOIN
	         	(hmm_locators to_locator) ON (to_locator.id = hmm_trans_lines.to_locator_id
	         		AND to_locator.deleted = 0)
	         	LEFT JOIN
	         	(ham_woop, ham_wo) ON (ham_woop.ham_wo_id = ham_wo.id
		         	AND ham_woop.id = hmm_trans_lines.ham_woop_id
		         	AND ham_woop.deleted = 0
		         	AND ham_wo.deleted = 0)
         	WHERE
	         	aos_products.id = aos_products_cstm.id_c
	         	AND hmm_trans_lines.item_id = aos_products.id
	         	AND hmm_trans_lines.primary_uom_id = haa_uom.id
	         	AND aos_products.deleted = 0
	         	AND hmm_trans_lines.deleted = 0
	         	AND haa_uom.deleted = 0
	         	AND hmm_trans_lines.trans_batch_id = '".$focus->id."'";

         	$result = $focus->db->query($sql);

         	while ($row = $focus->db->fetchByAssoc($result)) {
         		$line_data = json_encode($row);
         		$html .= "<script>insertLineData(" . $line_data . ",".$view.");</script>";
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
         	}
			}
         	if($view == 'EditView'){
    		//在编辑模式下显示按钮
         		$html .= '<script>insertTransLineFootor(\'lineItems\');</script>';
         	}
         	return $html;
         
     }
 }