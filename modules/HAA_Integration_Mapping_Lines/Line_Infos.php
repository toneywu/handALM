<?php

function display_lines_info($focus, $field, $value, $view){
  global $sugar_config, $locale, $app_list_strings, $mod_strings;
    //以下开始处理行显示相关的内容
  $html = '';
  if($view == 'EditView' || $view == 'DetailView'){
    $html .= '<script src="modules/HAA_Integration_Mapping_Lines/js/line_infos.js"></script>';
    $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineInfos' class='list view table'></table>";
    /*$html .= '<script>insertTransLineHeader(\'lineInfos\');</script>';*/

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
           $sql1="SELECT
           imdl.map_segment_name,
           imdl.maping_segment_title,
           imdl.required_flag
           FROM
           haa_integration_mapping_headers imh,
           haa_integration_mapping_def_headers imdh,
           haa_integration_mapping_def_lines imdl
           WHERE
           1 = 1
           AND imh.deleted = 0
           AND imdh.deleted = 0
           AND imdl.deleted = 0
           AND imh.haa_integration_mapping_def_headers_id_c = imdh.id
           AND imdl.haa_integration_mapping_def_headers_id_c = imdh.id
           AND imh.id = '".$focus->id."'"."order by imdl.line_number";
           $result1 = $focus->db->query($sql1);
           /*var_dump($sql1);*/
            //以下为拼接查询SQL，动态查出需要的字段。
           $sql = "SELECT 
           IML.id,
           IML.line_number,";
           while ($row1 = $focus->db->fetchByAssoc($result1)) {
                //var_dump($row1[map_segment_name]);
             /*$segment_data=*/
             $line_data1 = json_encode($row1);
             
             $html .= "<script>addlineheader(" . $line_data1 . ");</script>";
             $sql.="IML.".$row1["map_segment_name"].",";
           }

           $sql.="IML.required_flag,
           IML.description,
           IML.haa_integration_mapping_headers_id_c header_id
           FROM
           HAA_Integration_Mapping_HEADERs IMH,
           HAA_Integration_Mapping_Lines IML
           WHERE
           1 = 1 
           and IML.deleted=0
           and IML.haa_integration_mapping_headers_id_c=IMH.id
           AND IMH.id= '".$focus->id."'";

           $result = $focus->db->query($sql);
           /*var_dump($result);*/
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