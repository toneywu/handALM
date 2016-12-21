<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;

    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HAT_Counting_Rule_Dtls/js/line_items.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        $html .='<input type="hidden" name="explinetypeidden" id="explinetypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_split_accord'], '').'">';
        $html .='<input type="hidden" name="objlinetypeidden" id="objlinetypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_objects_type_list'], '').'">';
        $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
	hcrd.account_id_c,
	a.`name` account_name,
	hcrd.additional_comment,
	hcrd.default_counter,
	hcrd.description,
	hcrd.counting_obj_type,
	hcrd.id,
	hcrd.`name` dtls_name,
	hcrd.split_accord
FROM
	hat_counting_rules_hat_counting_rule_dtls_c hcr,
	hat_counting_rule_dtls hcrd
LEFT JOIN accounts a ON hcrd.account_id_c = a.id
WHERE
	hcrd.id = hcr.hat_counti3fa2le_dtls_idb
AND hcrd.deleted = 0
AND hcr.hat_counting_rules_hat_counting_rule_dtlshat_counting_rules_ida ='".$focus->id."'";
							
				
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