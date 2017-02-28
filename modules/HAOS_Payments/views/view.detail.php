<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.detail.php');

class HAOS_PaymentsViewDetail extends ViewDetail {

	function HAOS_PaymentsViewDetail(){
   parent::ViewDetail();
 }



 function display(){
  $modules = array(
    'HAOS_Payments',
    'HAOS_Payment_Invoices',
    );


  foreach ($modules as $module) {
    if (!is_file($GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js')) {
      require_once 'include/language/jsLanguage.php';
      jsLanguage::createModuleStringsCache($module, $GLOBALS['current_language']);
    }
    echo '<script type="text/javascript" src="' . $GLOBALS['sugar_config']['cache_dir'] . 'jsLanguage/' . $module . '/' . $GLOBALS['current_language'] . '.js?s=' . $GLOBALS['js_version_key'] . '&c=' . $GLOBALS['sugar_config']['js_custom_version'] . '&j=' . $GLOBALS['sugar_config']['js_lang_version'] . '"></script>';
  };

  $this->populateProductInfo();
  parent::display();
  $this->displayLineItems();
}
function populateProductInfo(){
 $bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id1_c);
       //var_dump($bean_contact);
 if ($bean_contact) { 
  $this->bean->contact_number = $bean_contact->employee_number_c; 
  $this->bean->contact_name =$bean_contact->name;          
}
}

function displayLineItems(){
  $focus=$this->bean;
  $html = ''; 
  
    echo '<script type="text/javascript" src="modules/HAOS_Payment_Invoices/js/line_subitems.js"></script>';
    //echo $html;
    $html .= "<table border='0' cellspacing='4' width='100%' id='lineSubItems' class='list view table'></table>";
    // $html .='<input type="hidden" name="period_status_type" id="period_status_type" value="'.get_select_options_with_id($app_list_strings['haa_period_status'], '').'">';
    echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
    $jsHTML = '';
    $jsHTML .= "<script>insertLineHeader('lineSubItems');</script>";

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

          $jsHTML .= "<script>$(document).ready(function(){";
          while ($row = $focus->db->fetchByAssoc($result)) {
           $line_data = json_encode($row);
           $jsHTML .= "insertLineData(" . $line_data . ");";
         }

         $jsHTML .= "goPagefist();})</script>";
       }
       $jsHTML .= '<script>insertLineFootor(\'lineSubItems\');</script>';
    
      echo $jsHTML;
   }

 }
 ?>
