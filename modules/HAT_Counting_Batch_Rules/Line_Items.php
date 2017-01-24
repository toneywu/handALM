<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAT_Counting_Batch_Rules/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";

		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
            h.id,
            h.account_id_c,
            a.`name` account_name,
            h.aos_product_categories_id_c,
            apc.`name` category_name,
            h.category_drilldown,
            h.category_split_flag,
            h.description,
            h.haa_codes_id_c,
            hc.`name` code_name,
            h.hat_asset_locations_id_c,
            hal.`name` location_name,
            h.location_drilldown,
            h.loc_split_flag,
            h.major_drilldown,
            h.major_split_flag,
            h.hat_counting_rules_id_c,
            h.`name` rule_name,
            h.org_drilldown,
            h.org_split_flag,
            h.user_person_split_flag,
            h.own_person_split_flag,
            c1.last_name user_name,
            h.user_contacts_id_c,
            c2.last_name own_name,
            h.own_contacts_id_c,
            h.hat_counting_policies_id_c,
            hcp.`name` policy_name,
            h.hat_counting_policy_groups_id_c,
            hcpg.name policy_group_name
            FROM
            hat_counting_batchs_hat_counting_batch_rules_c hcb,
            hat_counting_batch_rules h
            LEFT JOIN hat_asset_locations hal ON hal.id = h.hat_asset_locations_id_c
            LEFT JOIN accounts a ON a.id = h.account_id_c
            LEFT JOIN haa_codes hc ON hc.id = h.haa_codes_id_c
            LEFT JOIN aos_product_categories apc ON apc.id = h.aos_product_categories_id_c
            LEFT JOIN hat_counting_rules hcr ON hcr.id = h.hat_counting_rules_id_c
            LEFT JOIN contacts c1 ON c1.id = h.user_contacts_id_c
            LEFT JOIN contacts c2 ON c2.id = h.own_contacts_id_c
            LEFT JOIN hat_counting_policies hcp ON hcp.id = h.hat_counting_policies_id_c
            LEFT JOIN hat_counting_policy_groups hcpg on hcpg.id= h.hat_counting_policy_groups_id_c
            WHERE
            h.id = hcb.hat_counti8f01h_rules_idb
            AND h.deleted = 0
            AND hcb.hat_counti9a14_batchs_ida ='".$focus->id."'";

            $result = $focus->db->query($sql);

            while ($row = $focus->db->fetchByAssoc($result)) {
             $line_data = json_encode($row);
             $html .= "<script>insertLineData(" . $line_data . ");</script>";
          }
       }
       $html .= '<script>insertLineFootor(\'lineItems\');</script>';
    }
    else if($view == 'DetailView'){
    }
    return $html;
 }