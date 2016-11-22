<?php

function display_lines1($focus, $field, $value, $view){

    global  $app_list_strings, $mod_strings;

    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HPR_Group_Priviliges/js/line_items1.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='100%' id='lineItems1' class='list view table'></table>";
        $html .='<input type="hidden" name="modulehidden" id="modulehidden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">';
        $html .= '<script>insertLineHeader_pri("lineItems1");</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
	hgp.description,
	hgp.enabled_flag,
	hgp.hpr_group_members_id_c,
	hgp.id,
	hgp.module,
	hgp.name privilige_name,
	hgp.privilige_module,
	hgp.sql_statement_for_listview,
	hgm.name member_name
FROM
	hpr_group_priviliges hgp,
	hpr_groups_hpr_group_priviliges_c hgc,
	hpr_group_members hgm
WHERE
	hgp.id = hgc.hpr_groups_hpr_group_priviligeshpr_group_priviliges_idb
AND hgp.hpr_group_members_id_c = hgm.id
AND hgm.deleted = 0
and hgc.hpr_groups_hpr_group_priviligeshpr_groups_ida ='".$focus->id."'";
							
				
            $result = $focus->db->query($sql);
				
		while ($row = $focus->db->fetchByAssoc($result)) {
			$line_data = json_encode($row);
			$html .= "<script>insertLineData_pri(" . $line_data . ");</script>";
		}
      }
	  $html .= '<script>insertLineFootor_pri(\'lineItems1\');</script>';
    }
    else if($view == 'DetailView'){
	}
    return $html;
}
