<?php

function display_sublines($focus, $field, $value, $view){

	global $sugar_config, $locale, $app_list_strings, $mod_strings;

   

    $html = ''; 
    if($view == 'DetailView'){
      $html .= '<script type="text/javascript" src="modules/HAOS_Payment_Invoices/js/line_subitems.js"></script>';
      echo $html;
      $html .= "<table border='0' cellspacing='4' width='100%' id='lineSubItems' class='list view table'></table>";
		// $html .='<input type="hidden" name="period_status_type" id="period_status_type" value="'.get_select_options_with_id($app_list_strings['haa_period_status'], '').'">';


  
      $html .= "<script>insertLineHeader('lineSubItems');</script>";

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
         	$sql = "SELECT
          	payl.id,
           payl.haos_payments_id_c payment_name,
           payl.aos_invoices_id_c invoice_id,
           ainv.number invoice_number,
           ainv.name invoice_name,
           ainv.invoice_date,
           ainv.due_date invoice_due_date,
           ainvcs.late_days_c invoice_overdue_days,
           ainvcs.unpaied_amount_c invoice_unpaid_amount,
           payl.amount,
           payl.amount_usdollar,
           payl.description
           from 
             haos_payment_invoices payl,
             aos_invoices ainv
             LEFT JOIN aos_invoices_cstm ainvcs on ainv.id = ainvcs.id_c 
           where 1=1
           and payl.deleted = 0
           and payl.aos_invoices_id_c = ainv.id
           and ainv.id = ainvcs.id_c
           and payl.haos_payments_id_c ='".$focus->id."'
           order by ainv.number asc"
           ;
         	// and ha.id  ='".$focus->id."'"


           $result = $focus->db->query($sql);

            $html .= "<script>$(document).ready(function(){";
           while ($row = $focus->db->fetchByAssoc($result)) {
             $line_data = json_encode($row);
             $html .= "insertLineData(" . $line_data . ");";
         }

         $html .= "goPagefist();})</script>";
     }
     $html .= '<script>insertLineFootor(\'lineSubItems\');</script>';
 }
 else if($view == 'EditView'){
 }
 return $html;
}



function display_lines_info($focus, $field, $value, $view){
  global $sugar_config, $locale, $app_list_strings, $mod_strings;
    //以下开始处理行显示相关的内容
  $html = '';
  if($view == 'EditView' || $view == 'DetailView'){
    $html .= '<script src="modules/HAOS_Payment_Invoices/js/line_subitems.js"></script>';
    $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineInfos' class='list view table'></table>";
    //$html .='<input type="hidden" name="InterLineStatus" id="InterLineStatus" value="'.get_select_options_with_id($app_list_strings['haa_integration_line_status'], '').'">'; 
    
    /*$html .= '<script>insertTransLineHeader(\'lineInfos\');</script>';*/

         if($focus->id != '') { //如果不是新增（即如果是编辑已有记录）
           $sql1="SELECT
            payl.id,
           payl.haos_payments_id_c payment_name,
           payl.aos_invoices_id_c invoice_id,
           ainv.number invoice_number,
           ainv.name invoice_name,
           ainv.invoice_date,
           ainv.due_date invoice_due_date,
           ainvcs.late_days_c invoice_overdue_days,
           ainvcs.unpaied_amount_c invoice_unpaid_amount,
           payl.amount,
           payl.amount_usdollar,
           payl.description
           from 
             haos_payment_invoices payl,
             aos_invoices ainv
             LEFT JOIN aos_invoices_cstm ainvcs on ainv.id = ainvcs.id_c 
           where 1=1
           and payl.deleted = 0
           and payl.aos_invoices_id_c = ainv.id
           and ainv.id = ainvcs.id_c
           and payl.haos_payments_id_c ='".$focus->id."'
           order by ainv.number asc"
           ;

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