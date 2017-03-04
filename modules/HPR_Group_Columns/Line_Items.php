<?php

function display_lines($focus, $field, $value, $view){

	global  $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView' || $view == 'DetailView'){
		$html .= '<script src="modules/HPR_Group_Columns/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='100%' id='lineItems2' class='list view table'></table>";
		/* $html .='<input type="hidden" name="modulehidden" id="modulehidden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">';*/
		$html .= '<script>insertLineHeader_c("lineItems2");</script>';
        if(isset($focus->id)&&$focus->id != ''){
            $html .= "showModuleFields();";
            $html .= "document.getElementById('btnaddNewLine_c').disabled = '';"; //
         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
            hgc.id line_id,
            hgg.hpr_group_columns_hpr_group_priviligeshpr_group_priviliges_ida header_id,
            hgc.sort_number,
            hgc.hpr_column_name,
            hgc.edit_enable_flag,
            hgc.hide_enable_flag,
            hgc.description
            FROM
            hpr_group_priviliges hgp,
            hpr_group_columns_hpr_group_priviliges_c hgg,
            hpr_group_columns hgc
            WHERE
            1 = 1
            AND hgp.id = hgg.hpr_group_columns_hpr_group_priviligeshpr_group_priviliges_ida
            and hgc.id=hgg.hpr_group_columns_hpr_group_priviligeshpr_group_columns_idb
            and hgg.deleted=0
            AND hgc.deleted = 0
            AND hgp.deleted = 0
            and hgp.id ='".$focus->id."'";


            $result = $focus->db->query($sql);

            while ($row = $focus->db->fetchByAssoc($result)) {
             $line_data = json_encode($row);
             $html .= "<script>insertLineData_c(" . $line_data . ");</script>";
         }
     }
     $html .= '<script>insertLineFootor_c(\'lineItems2\');</script>';
 }
}
 else if($view == 'DetailView'){
 }
 return $html;
}
