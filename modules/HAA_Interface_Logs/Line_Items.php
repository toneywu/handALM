<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAA_Interface_Logs/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
		/*$html .='<input type="hidden" name="explinetypeidden" id="explinetypeidden" value="'.get_select_options_with_id($app_list_strings['hie_exp_line_type_list'], '').'">';*/
		$html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
         	hil.id,
         	hil. NAME,
         	hil.description,
         	hil.date_entered,
         	hil.created_by,
         	usr.user_name create_person,
         	hil.seq
         	FROM
         	haa_interface_logs hil,
         	users usr
         	WHERE
         	hil.created_by = usr.id
         	AND hil.haa_interface_id_c ='".$focus->id."'";
         	$sql = $sql." ORDER BY hil.seq desc";					
		  //echo $sql;		
         	$result = $focus->db->query($sql);
         	
         	while ($row = $focus->db->fetchByAssoc($result)) {
         		$line_data = json_encode($row);
         		$html .= "<script>insertLineData(" . $line_data . ");</script>";
         	}
         }
         /* $html .= '<script>insertLineFootor(\'lineItems\');</script>';*/
     }
     else if($view == 'DetailView'){
     }
     return $html;
 }
