<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;
	
	$html = '';
	if($view == 'EditView'){
		$html .= '<script src="modules/HAT_Counting_Task_Templates/line_items.js"></script>';
		$html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>"
		$html .='<input type="hidden" name="tablenamedden" id="tablenamedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_table_name'], '').'">';
      $html .='<input type="hidden" name="columnnamedden" id="columnnamedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_column_name'], '').'">';
      $html .='<input type="hidden" name="fieldtypedden" id="fieldtypedden" value="'.get_select_options_with_id($app_list_strings['hat_counting_field_type'], '').'">';
      $html .='<input type="hidden" name="listtypedden" id="listtypedden" value="'.get_select_options_with_id($app_list_strings['moduleList'], '').'">';
      $html .= '<script>insertLineHeader(\'lineItems\');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
            hctd.id,
            hctd.hat_counting_task_templates_id_c,
            hctt.`name` template_name,
            hctd.sort_order,
            hctd.field_lable,
            hctd.table_names,
            hctd.column_name,
            hctd.field_type,
            hctd.relate_module,
            hctd.module_filter,
            hctd.list_name,
            hctd.required_flag,
            hctd.can_edit_flag,
            hctd.lookup_type,
            hctd.enabled_flag,
            hctd.description,
            hctd.haa_valuesets_id_c,
            hv.`name` valueset_name,
            hctd.asset_options,
            hctd.module_dsp,
            hctd.on_diff_flag
            FROM
            hat_counting_task_templates_hat_counting_template_details_c h,
            hat_counting_template_details hctd
            LEFT JOIN haa_valuesets hv ON hv.id = hctd.haa_valuesets_id_c,
            hat_counting_task_templates hctt
            WHERE
            1 = 1
            AND hctd.id = h.hat_countib27cdetails_idb
            AND hctt.id = h.hat_countid917mplates_ida
            AND hctt.deleted = 0
            AND hctd.deleted = 0
            AND h.deleted = 0
            AND hctt.id ='".$focus->id."'";

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