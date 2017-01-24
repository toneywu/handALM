<?php

function display_lines($focus, $field, $value, $view){

    global $sugar_config, $locale, $app_list_strings, $mod_strings;

    $html = '';
    if($view == 'EditView'){
        $html .= '<script src="modules/HAA_Integration_System_Def_Lines/js/line_items.js"></script>';
        $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        $html .='<input type="hidden" name="sysclomnname" id="sysclomnname" value="'.get_select_options_with_id($app_list_strings['haa_integration_sys_column_name'], '').'">';
        $html .='<input type="hidden" name="integrationdatetype" id="integrationdatetype" value="'.get_select_options_with_id($app_list_strings['haa_integration_data_type'], '').'">';
         $html .='<input type="hidden" name="sysclomntype" id="sysclomntype" value="'.get_select_options_with_id($app_list_strings['haa_integration_sys_column_type'], '').'">';
        $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
			$sql = "SELECT
	ISDL.id line_id,
	ISDH.haa_integrc471headers_ida header_id,
	ISDL.column_name,
	ISDL.column_type,
	ISDL.column_title,
	ISDL.column_length,
	ISDL.column_data_type,
	ISDL.enabled_flag,
	ISDL.line_number,
	ISDL.required_flag,
	ISDL.haa_valuesets_id_c,
	ISDL.column_mask,
	hv.`name` valueset_name
	
FROM
	haa_integrbaeddef_lines_c ISDH,
	haa_integration_system_def_lines ISDL
LEFT JOIN haa_valuesets hv ON ISDL.haa_valuesets_id_c = hv.id
WHERE
	1 = 1
AND ISDL.deleted = 0
AND ISDH.deleted = 0
AND ISDL.id = ISDH.haa_integrd80ef_lines_idb
AND ISDH.haa_integrc471headers_ida = '".$focus->id."'";
				
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