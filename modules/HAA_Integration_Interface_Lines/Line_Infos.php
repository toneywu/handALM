<?php

function display_lines_info($focus, $field, $value, $view){
  global $sugar_config, $locale, $app_list_strings, $mod_strings;
    //以下开始处理行显示相关的内容
  $html = '';
  if($view == 'EditView' || $view == 'DetailView'){
    $html .= '<script src="modules/HAA_Integration_Interface_Lines/js/line_infos.js"></script>';
    $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineInfos' class='list view table'></table>";
    /*$html .= '<script>insertTransLineHeader(\'lineInfos\');</script>';*/

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
           and isdl.enabled_flag=1
           AND iih.id='".$focus->id."'"."order by isdl.line_number";
           $result1 = $focus->db->query($sql1);
          /* var_dump($sql1);*/
            //以下为拼接查询SQL，动态查出需要的字段。
           $sql = "SELECT
           iil.id,
           iil.haa_integration_interface_headers_id_c header_id,
           iil.ext_line_id,";
           while ($row1 = $focus->db->fetchByAssoc($result1)) {
                //var_dump($row1[map_segment_name]);
             /*$segment_data=*/
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
           AND iih.id='".$focus->id."'"."order by iil.ext_line_id" ;

           $result = $focus->db->query($sql);
           /*var_dump($sql);*/
           $html .= '<script>insertTransLineHeader(\'lineInfos\');</script>';

           $html .= "<script>$(document).ready(function(){";
           while ($row = $focus->db->fetchByAssoc($result)) {
             $line_data = json_encode($row);
             /*var_dump($line_data);*/
             $html .= "insertLineData('".$line_data."','".$view."');";
             $html .= 'resetLineNum();';
			//REF:custom/modules/HAT_Asset_Trans/js/line_items.js
            //通过insertLineData向已经完成初始化的页面要素中，写入值
           }
           $html .= "goPagefist();";
           $html .= "})</script>";          
         }
       }
       return $html;
     }