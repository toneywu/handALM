<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;
    
    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HAT_Counting_Lines/line_items.js"></script>';
        $html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>"
        $html .='<input type="hidden" name="resactastidden" id="resactastidden" value="'.get_select_options_with_id($app_list_strings['hat_asset_status_list'], '').'">';
        $html .='<input type="hidden" name="rescountresidden" id="rescountresidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_line_result_list'], '').'">';
        $html .='<input type="hidden" name="resadjmetidden" id="resadjmetidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_method_list'], '').'">';
        $html .='<input type="hidden" name="resadjstaidden" id="resadjstaidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_status_list'], '').'">';
        $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
	hcr.account_id_c,
	a.`name` account_name,
	hcr.actual_asset_status,
	hcr.actual_quantity,
	hcr.hat_asset_locations_id_c,
	hal.`name` location_name,
	hcr.qty_diff_flag,
	hcr.loct_diff_flag,
	hcr.org_diff_flag,
	hcr.status_diff_flag,
	hcr.counting_result,
	hcr.adjust_method,
	hcr.adjust_needed,
	hcr.adjust_status,
	hcr.id,
	hcr.cycle_number,
	hcr.haa_codes_id_c,
	hc.`name` code_name,
	hcr.major_diff_flag,
	cc1.chinese_name_c user_name,
	hcr.user_contacts_id_c,
	cc2.chinese_name_c own_name,
	hcr.own_contacts_id_c,
	hcr.user_diff_flag,
	hcr.own_diff_flag
FROM
	hat_counting_lines_hat_counting_results_c hcl,
	hat_counting_results hcr
LEFT JOIN hat_asset_locations hal ON hal.id = hcr.hat_asset_locations_id_c
LEFT JOIN accounts a ON hcr.account_id_c = a.id
LEFT JOIN haa_codes hc ON hc.id = hcr.haa_codes_id_c
LEFT JOIN contacts c1 ON c1.id = hcr.user_contacts_id_c
LEFT JOIN contacts c2 ON c2.id = hcr.own_contacts_id_c,
 contacts_cstm cc1,
 contacts_cstm cc2
WHERE
	hcr.id = hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb
AND c1.id = cc2.id_c
AND c2.id = cc2.id_c
AND hcr.deleted = 0
AND hcl.deleted = 0
and hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$focus->id."'";
							
			
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