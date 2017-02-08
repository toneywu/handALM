<?php

function display_lines($focus, $field, $value, $view){

   global $sugar_config, $locale, $app_list_strings, $mod_strings;

    //以下开始处理行显示相关的内容
   $html = '';
   if($view == 'EditView' || $view == 'DetailView'){
      $html .= '<script src="modules/HAT_Counting_Lines/line_items.js"></script>';
      $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
      $html .='<input type="hidden" name="resactastidden" id="resactastidden" value="'.get_select_options_with_id($app_list_strings['hat_asset_status_list'], '').'">';
      $html .='<input type="hidden" name="rescountresidden" id="rescountresidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_line_result_list'], '').'">';
      $html .='<input type="hidden" name="resadjmetidden" id="resadjmetidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_method_list'], '').'">';
      $html .='<input type="hidden" name="resadjstaidden" id="resadjstaidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_status_list'], '').'">';

      $sql ="SELECT
      hcr.cycle_number,
      hcr.counting_result,
      hcr.adjust_method,
      hcr.adjust_needed,
      hcr.id,";

      $sql_template="SELECT
      hctd.field_lable,
      hctd.column_name,
      hctd.field_type,
      hctd.relate_module,
      hctd.module_dsp,
      hctd.list_name
      FROM
      hat_counting_tasks hct,
      hat_counting_lines hcl,
      hat_counting_task_templates_hat_counting_template_details_c h,
      hat_counting_template_details hctd
      WHERE
      1 = 1
      AND hct.deleted =0
      and hcl.deleted =0
      and h.deleted=0
      and hctd.deleted=0
      and hcl.hat_counting_tasks_id_c=hct.id
      AND hct.hat_counting_task_templates_id_c = h.hat_countid917mplates_ida
      AND h.hat_countib27cdetails_idb = hctd.id
      AND hctd.table_names = 'INV_DETAIL_RESULTS'
      AND hcl.id='".$focus->id."'";
      $result_template = $focus->db->query($sql_template);
      $attr_label =array();
      $attr_data =array();
      $attr_type =array();
      $attr_module =array();
      $attr_dsp =array();
      $attr_name =array();
      $num=0;
      while ($row_template = $focus->db->fetchByAssoc($result_template)) {
         $sql.="hcr.".$row_template["column_name"].",";
         $attr_label[$num]=$row_template["field_lable"];
         $attr_data[$num]=$row_template["column_name"];
         $attr_type[$num]=$row_template["field_type"];
         $attr_module[$num]=$row_template["relate_module"];
         $attr_dsp[$num]=$row_template["module_dsp"];
         $attr_name[$num]=$row_template["list_name"];
         $num++;
      }
      $sql.="hcr.adjust_status
      FROM
      hat_counting_lines_hat_counting_results_c h,
      hat_counting_results hcr
      WHERE
      hcr.id = h.hat_counting_lines_hat_counting_resultshat_counting_results_idb
      AND hcr.deleted = 0
      AND h.deleted = 0
      and h.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$focus->id."'";
         //var_dump($sql);
      $result=$focus->db->query($sql);
      $attr_label= json_encode($attr_label);
      $attr_column= json_encode($attr_data);
      $column_type= json_encode($attr_type);
      $html .= '<script>
      var attr_label=\''.$attr_label.'\';var attr_data=\''.$attr_column.'\';var attr_type=\''.$column_type.'\';
      insertLineHeader("lineItems","DetailView",attr_label,attr_data,attr_type,false);</script>';
      $html .= "<script>$(document).ready(function(){";
      $column_name=array();
      while ($row = $focus->db->fetchByAssoc($result)) {
        for($i=0;$i<$num;$i++){
         if($attr_type[$i]=='LOV' && $row[$attr_data[$i]]!=''){
            if($row[$attr_data[$i]]){
               $sql_attr="SELECT
               ".$attr_dsp[$i]." name
               FROM ".$attr_module[$i]." 
               WHERE
               id = '".$row[$attr_data[$i]]."'";
               $result_attr = $focus->db->query($sql_attr);
               $row_attr = $focus->db->fetchByAssoc($result_attr);
               array_push($column_name, array($attr_data[$i]=>$row_attr["name"]));
            }
         }
      }
      $column_name= json_encode($column_name);
      $line_data = json_encode($row);
      $html .='var column_name=\''.$column_name.'\';';
      $html .= "insertLineData(" . $line_data .",'".$view."',column_name);";
      $html .= 'resetLineNum_Bold();';
   }
   $html .= "})</script>";


}
return $html;
}
/* function display_lines($focus, $field, $value, $view){

   global $sugar_config, $locale, $app_list_strings, $mod_strings;
   
   $html = '';
   if($view == 'EditView'|| $view == 'DetailView'){
      $html .= '<script src="modules/HAT_Counting_Lines/line_items.js"></script>';
      $html.="<table border='0' cellspacing='4' width='100%' id='lineItems' class='listviewtable' style='table-layout: fixed;'></table>"
      $html .='<input type="hidden" name="resactastidden" id="resactastidden" value="'.get_select_options_with_id($app_list_strings['hat_asset_status_list'], '').'">';
      $html .='<input type="hidden" name="rescountresidden" id="rescountresidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_line_result_list'], '').'">';
      $html .='<input type="hidden" name="resadjmetidden" id="resadjmetidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_method_list'], '').'">';
      $html .='<input type="hidden" name="resadjstaidden" id="resadjstaidden" value="'.get_select_options_with_id($app_list_strings['hat_counting_adjust_status_list'], '').'">';
      $html .= '<script>insertLineHeader(\'lineItems\','');</script>';

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
            $sql = "SELECT
            hcr.account_id_c,
            a.`name` account_name,
            hcr.actual_asset_status,
            hcr.actual_quantity,
            hcr.hat_asset_locations_id_c,
            hal.`name` location_name,
            hcr.qty_diff_flag,
            hcr.loct_diff_flag,
            hcr.org_diff_flag,
            hcr.status_diff_flag,
            hcr.counting_result,
            hcr.adjust_method,
            hcr.adjust_needed,
            hcr.adjust_status,
            hcr.id,
            hcr.cycle_number,
            hcr.haa_codes_id_c,
            hc.`name` code_name,
            hcr.major_diff_flag,
            cc1.chinese_name_c user_name,
            hcr.user_contacts_id_c,
            cc2.chinese_name_c own_name,
            hcr.own_contacts_id_c,
            hcr.user_diff_flag,
            hcr.own_diff_flag
            FROM
            hat_counting_lines_hat_counting_results_c hcl,
            hat_counting_results hcr
            LEFT JOIN hat_asset_locations hal ON hal.id = hcr.hat_asset_locations_id_c
            LEFT JOIN accounts a ON hcr.account_id_c = a.id
            LEFT JOIN haa_codes hc ON hc.id = hcr.haa_codes_id_c
            LEFT JOIN contacts c1 ON c1.id = hcr.user_contacts_id_c
            LEFT JOIN contacts_cstm cc1 ON cc1.id_c = c1.id
            LEFT JOIN contacts c2 ON c2.id = hcr.own_contacts_id_c
            LEFT JOIN contacts_cstm cc2 ON cc2.id_c = c2.id
            WHERE
            hcr.id = hcl.hat_counting_lines_hat_counting_resultshat_counting_results_idb
            AND hcr.deleted = 0
            AND hcl.deleted = 0
            and hcl.hat_counting_lines_hat_counting_resultshat_counting_lines_ida ='".$focus->id."'";
            
            
            $result = $focus->db->query($sql);
            
            while ($row = $focus->db->fetchByAssoc($result)) {
               $line_data = json_encode($row);
               $html .= "insertLineData(" . $line_data .",'".$view."');</script>";
            }
         }
         $html .= '<script>insertLineFootor(\'lineItems\');</script>';
      }
      else if($view == 'DetailView'){
      }
      return $html;
   }*/