<?php

function display_lines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

	$html = '';
	if($view == 'EditView'){
		$segmentlist='';
		$html .= '<script src="modules/HAA_Integration_Interface_Lines/js/line_items.js"></script>';
		$html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
		$html .='<input type="hidden" name="InterLineStatus" id="InterLineStatus" value="'.get_select_options_with_id($app_list_strings['haa_integration_line_status'], '').'">';
		

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
            $sql1="SELECT
            isdl.column_name,
            isdl.column_title,
            isdl.required_flag
            FROM
            haa_integration_interface_headers iih,
            haa_interfaces inter,
            haa_integration_system_def_headers isdh,
            haa_integrbaeddef_lines_c ihlc,
            haa_integration_system_def_lines isdl
            where 1=1
            and inter.deleted=0
            and iih.deleted=0
            and isdh.deleted=0
            and ihlc.deleted=0
            and isdl.deleted=0
            and inter.interface_code=iih.interface_code
            and inter.haa_frameworks_id_c=iih.haa_frameworks_id_c
            and isdh.haa_interfaces_id_c=inter.id
            and ihlc.haa_integrc471headers_ida=isdh.id
            and ihlc.haa_integrd80ef_lines_idb=isdl.id
            and isdl.column_type='S'
            and isdl.enabled_flag=1
            AND iih.id='".$focus->id."'"."order by isdl.line_number";
            $result1 = $focus->db->query($sql1);
            $sql = "SELECT
            iil.id,
            iil.haa_integration_interface_headers_id_c header_id,
            iil.ext_line_id,";
            while ($row1 = $focus->db->fetchByAssoc($result1)) {
               $line_data1 = json_encode($row1);
               $html .= "<script>addlineheader(" . $line_data1 . ");</script>";
               $sql.="iil.".$row1["column_name"].",";
           }
            $sql.="iil.line_status,
            iil.process_message,
            iil.description
            FROM
            haa_integration_interface_lines iil,
            haa_integration_interface_headers iih
            where 1=1
            and iil.deleted=0
            and iil.haa_integration_interface_headers_id_c=iih.id
            AND iih.id='".$focus->id."'" ;

            $result = $focus->db->query($sql);
            $html .= '<script>insertLineHeader(\'lineItems\');</script>';
            // $html .= "<script>setHeaderItem();</script>";
            while ($row = $focus->db->fetchByAssoc($result)) {
               $line_data = json_encode($row);
               $html .= "<script>insertLineData(" . $line_data . ");</script>";
            
           }
            
       }else{
          $html .= '<script>hidesubpanl();</script>';
       }
       $html .= '<script>insertLineFootor(\'lineItems\');</script>';
   }
   else if($view == 'DetailView'){
   }
   return $html;
}