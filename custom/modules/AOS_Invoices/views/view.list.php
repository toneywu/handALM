<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class AOS_InvoicesViewList extends ViewList
{
/*
 *  重写方法，添加where条件
 */
  function processSearchForm(){
    parent::processSearchForm();
   //  $haa_frameworks_id=$_SESSION["current_framework"];
   //  if ($this->where) { 
   //    $this->where.=" AND haa_frameworks_id_c ='".$haa_frameworks_id."'";
   //  }else{
   //   $this->where.=" where haa_frameworks_id_c ='".$haa_frameworks_id."'";
   // }
 } 

 function display()
{
	echo '<script src="custom/modules/AOS_Invoices/js/AOS_Invoices_listview.js"></script>';
	parent::display();
  echo '<script>
      $(function(){
        $("button[name=btn_event_type_basic]").removeAttr("onclick");
        $("button[name=btn_event_type_basic]").click(function(){
          open_popup("HAT_EventType", 600, 400, "&basic_type_advanced=REVENUE", true, false, {"call_back_function":"set_return","form_name":"search_form","field_to_name_array":{"id":"hat_eventtype_id_c_basic","name":"event_type_basic"}}, "single", true);
        });
      });
    </script>';
    
    //创建付款相关
    echo "<script>
      if($(\"#createInvoiceBtn\").length==0){
      var createInvBtn=$('<ul><input style=\"border:0;\" id=\"createInvoiceBtn\" type=\"button\" value=\"批量收付款\" onclick=\"createPaymentsForManyInv()\"></ul>');
      createInvBtn.insertBefore('#actionLinkTop');
      }
    </script>";
    //引用JS文件
    echo "<script type=\"text/javascript\" src=\"custom/modules/AOS_Invoices/js/AOS_Invoices_HAOS_Payments.js\"></script>";


}
}