<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView'){
		$segmentlist='';
		$html .= '<script src="modules/HAA_Integration_Mapping_Def_Lines/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
		$html .='<input type="hidden" name="segmenttype" id="segmenttype" value="'.get_select_options_with_id($app_list_strings['haa_integration_segment_type'], '').'">';
		$html .='<input type="hidden" name="segmentname" id="segmentname" value="'.get_select_options_with_id($app_list_strings['haa_integration_map_segment_name'], '').'">';
		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
         	imdl.id,
         	imdl.line_number,
         	imdl.segment_type,
         	imdl.maping_segment_title,
         	imdl.map_segment_name,
         	imdl.required_flag,
         	imdl.description,
         	imdl.haa_integration_system_def_lines_id_c,
         	isdl.column_name,
         	imdh.id header_id
         	FROM
         	haa_integration_mapping_def_lines imdl,
         	haa_integra718def_lines_c imdh,
         	haa_integration_system_def_lines isdl
         	WHERE
         	1 = 1
         	and imdl.deleted=0
         	and imdh.deleted=0
         	AND imdl.id = imdh.haa_integr6553f_lines_idb
         	AND imdl.haa_integration_system_def_lines_id_c = isdl.id
			AND imdh.haa_integr33edheaders_ida='".$focus->id."'";


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