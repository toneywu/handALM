<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;

    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HPR_Group_Members/js/line_items.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='100%' id='lineItems' class='list view table'></table>";
        // $html .='<input type="hidden" name="explinetypeidden" id="explinetypeidden" value="'.get_select_options_with_id($app_list_strings['hie_exp_line_type_list'], '').'">';
        $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
	hgm.id,
	hgm.account_id_c,
	a.`name` account_name,
	hgm.description,
	hgm.enabled_flag,
	hgm.`name` member_name,
	hgm.user_id_c,
	u.last_name
FROM
	hpr_group_members hgm,
	hpr_groups_hpr_group_members_c hgc,
	accounts a,
	users u
WHERE
	hgm.id = hgc.hpr_groups_hpr_group_membershpr_group_members_idb
AND hgm.account_id_c = a.id
AND hgm.user_id_c = u.id
AND hgm.deleted = 0
AND hgc.hpr_groups_hpr_group_membershpr_groups_ida ='".$focus->id."'";
							
				
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
