<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;
	
	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAT_Counting_Policies/line_items.js"></script>';
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>"
		/*$html .='<input type="hidden" name="splittypeidden" id="splittypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_split_type'], '').'">';*/
		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
            hcp.id,
            hcp.name,
            hcp.description,
            hcp.enabled_flag,
            hcp.group_clause,
            hcp.hat_counting_policies_id_c,
            hcp.seq,
            hcps.name policy_name,
            hcp.additional_logic,
            hcp.hat_counting_task_templates_id_c,
            hctt.name template_name
            FROM
            hat_counting_policy_lines hcp,
            hat_counting_policies hcps,
            hat_counting_policies_hat_counting_policy_lines_c h,
            hat_counting_task_templates hctt
            WHERE
            hcp.id = h.hat_countifea6y_lines_idb
            and hcp.hat_counting_task_templates_id_c= hctt.id
            and hcps.id = h.hat_counti5649olicies_ida
            AND hcp.deleted = 0
            AND h.deleted = 0
            AND h.hat_counti5649olicies_ida ='".$focus->id."'";

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