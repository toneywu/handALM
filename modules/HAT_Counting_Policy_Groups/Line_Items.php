<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;
	
	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAT_Counting_Policy_Groups/line_items.js"></script>';
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>"
		$html .='<input type="hidden" name="splittypeidden" id="splittypeidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_split_type'], '').'">';
		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
            hcp.id,
            hcp.name,
            hcp.data_populate_sql,
            hcp.description,
            hcp.split_type,
            hcp.enabled_flag,
            hcp.hat_counting_policy_groups_id_c,
            hcpg.name group_name,
            hcp.hat_counting_task_templates_id_c,
            hctt.name template_name
            FROM
            hat_counting_policies hcp,
            hat_counting_policy_groups hcpg,
            hat_counting_policy_groups_hat_counting_policies_c h,
            hat_counting_task_templates hctt
            WHERE
            hcp.id = h.hat_counti9da1olicies_idb
            and hcpg.id = h.hat_counti1658_groups_ida
            and hctt.id=hcp.hat_counting_task_templates_id_c
            AND hcp.deleted = 0
            AND h.deleted = 0
            AND h.hat_counti1658_groups_ida ='".$focus->id."'";

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