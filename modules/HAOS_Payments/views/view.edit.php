<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.edit.php');

class HAOS_PaymentsViewEdit extends ViewEdit
{

    function Display() { 


       
        //add 2017-02-28 获取其它页面跳转数据
        //$frameworks_id_get = $_GET['haa_frameworks_id_c'];        
        //end add
        //--------------
        require_once('modules/HAA_Frameworks/orgSelector_class.php');
        if(isset($_GET["haa_frameworks_id_c"])){//判断数据是否传过来
            $current_framework_id=$_GET["haa_frameworks_id_c"];

        }else{
          $current_framework_id = empty($this->bean->haa_frameworks_id_c)?"":$this->bean->haa_frameworks_id_c;
        } 

        $current_module = $this->module;
        $current_action = $this->action;
        $beanFramework = BeanFactory::getBean('HAA_Frameworks', $_SESSION["current_framework"]);
        if (isset($beanFramework)) {
            $bean_framework_id = $_SESSION["current_framework"];
            $bean_framework_name = $beanFramework->name;
        }
        $this->ss->assign('FRAMEWORK_C',set_framework_selector($current_framework_id,$current_module,$current_action,'haa_frameworks_id_c'));
        ///-----------------
      

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
        echo '<script type="text/javascript" src="custom/resources/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>';
        echo '<script type="text/javascript" src="modules/HAOS_Payments/js/HAOS_Payments_editview.js"></script>';
        

          $this->populateProductInfo();
         
        //LOV
      
        
        parent::Display();
       

      if($_GET['requestSourceModules']){

        $frm_id = $current_framework_id;
       if($current_framework_id){
          $frm_id = $current_framework_id;
       }else{
         $frm_id = $bean_framework_id;
       }

       $payMentsMaxNum = $this->getMaxPaymentsNum($frm_id);  

          $contact_id_get = $_GET['billing_contact_id'];
          $account_id_get = $_GET['billing_account_id'];          
          $description_get = $_GET['description'];
          $method_type_get = $_GET['payment_method_type'];
          $payment_amount_get = $_GET['payment_amount'];
          $payment_date_get = $_GET['payment_date'];
          $currency_id_get = $_GET['currency_id'];  
          $period_info = $this->getPeriodName($_GET["haa_frameworks_id_c"],$payment_date_get);
          $period_name = $period_info['periods_name'];
          $period_id = $period_info['periods_id'];
        $bean_contact= BeanFactory::getBean('Contacts', $contact_id_get);
       //var_dump($bean_contact);
        if ($bean_contact) {  
         $employee_number_c  =$bean_contact->employee_number_c; 
         $name =  $bean_contact->name;      
         echo  "<script>
               document.getElementById('contact_id1_c').value='".$contact_id_get."';  
               document.getElementById('contact_number').value='".$employee_number_c."';  
               document.getElementById('contact_name').value='".$name."';  
           </script>";
       }

        $bean_accounts= BeanFactory::getBean('Accounts', $account_id_get);
        if ($bean_accounts) {          
         $cust_account_name =  $bean_accounts->name;      
          echo "<script>
               document.getElementById('account_id_c').value='".$account_id_get."'; 
               document.getElementById('cust_account_name').value='".$cust_account_name."'; 
           </script>";
       }
    
       // document.getElementById('currency_id_select').value='".$currency_id_select."';
       echo "<script>
        document.getElementById('name').value='".$payMentsMaxNum."';
        document.getElementById('payment_date').value='".$payment_date_get."';
        document.getElementById('payment_amount').value='".$payment_amount_get."';
        document.getElementById('payment_method_type').value='".$method_type_get."';
        document.getElementById('description').value='".$description_get."';
        document.getElementById('period_name').value='".$period_name."';
        document.getElementById('haa_periods_id_c').value='".$period_id."';
       </script>";
        $cord_array = array();
        if (isset($_GET["cordArr"])){          
          $cord = $_GET["cordArr"]; 
          $cord_array = preg_split('/,/', $cord);

        }
        $this->displayInvLineItems($cord_array);

      } else{
         $this->displayLineItems(); 
      }
 // document.getElementById('currency_id_select').value='".$currency_id_get."';
 //        document.getElementById('source_code_c').value='HAOS_Revenues_Quotes';
     

       //end add 170301
    //add by hq 20170301 自动带出期间
    echo "<script> 
      
        $('.datetimepicker.datetimepicker-dropdown-bottom-right.dropdown-menu').click(function(){
          getPeriod();
        });
          
    </script>";
    //end 20170301


    }


            //增加LOV逻辑
 function populateProductInfo(){
     $bean_contact= BeanFactory::getBean('Contacts', $this->bean->contact_id1_c);
       //var_dump($bean_contact);
     if ($bean_contact) {          
             //$line_data = json_encode($row);
      $this->bean->contact_number = $bean_contact->employee_number_c; 
      $this->bean->contact_name =$bean_contact->name;
             //   
    }
}

 function getMaxPaymentsNum($frm_id){
    $focus=$this->bean;
    $maxnum = 1;
      $sql="SELECT
          max(hp.name+0) maxnum
        from haos_payments hp
        where hp.deleted = 0
        and hp.haa_frameworks_id_c='".$frm_id."'";

     $result = $focus->db->query($sql);
    while ($row =  $focus->db->fetchByAssoc($result)) {
      if($row['maxnum']){
        $maxnum = $row['maxnum']+1;
      }else{
        $maxnum=1;
      }
    }
    return $maxnum;

  }

function displayLineItems(){
   $focus=$this->bean;
   $sort_order_num = 0;
 
   $html = '';
  
      echo '<script src="modules/HAOS_Payment_Invoices/js/line_items.js"></script>';
      $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        // $html .='<input type="hidden" name="period_status_type" id="period_status_type" value="'.get_select_options_with_id($app_list_strings['haa_period_status'], '').'">';

      echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
      echo'<script>insertLineHeader(\'lineItems\');</script>';

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

            while ($row = $focus->db->fetchByAssoc($result)) {
               $line_data = json_encode($row);
               echo "<script>insertLineData(" . $line_data . ");</script>";
           }
       }
       echo '<script>insertLineFootor(\'lineItems\');</script>';


}

/**
* 增加发票跳转创建行
*/
function displayInvLineItems($idarr){
   $focus=$this->bean;
   $sort_order_num = 0;
 
   $html = '';
  
      echo '<script src="modules/HAOS_Payment_Invoices/js/line_items.js"></script>';
      $html .= "<table border='0' cellspacing='4' width='37.5%' id='lineItems' class='list view table'></table>";
        // $html .='<input type="hidden" name="period_status_type" id="period_status_type" value="'.get_select_options_with_id($app_list_strings['haa_period_status'], '').'">';

      echo "<script>replace_display_lines(" .json_encode($html).",'line_items_span'".");</script>";
      echo'<script>insertLineHeader(\'lineItems\');</script>';

        foreach ($idarr as  $id) {
            $sql = "SELECT
            '' id,
            '' payment_name,
            ainv.id invoice_id,
            ainv.number invoice_number,
            ainv.name invoice_name,
            ainv.invoice_date,
            ainv.due_date invoice_due_date,
            ainvcs.late_days_c invoice_overdue_days,
            ainvcs.unpaied_amount_c invoice_unpaid_amount,
            ainvcs.unpaied_amount_c  amount,
            '' amount_usdollar,
            '' description
            from 
            aos_invoices ainv
            LEFT JOIN aos_invoices_cstm ainvcs on ainv.id = ainvcs.id_c 
            where 1=1
            and ainv.deleted = 0
            and ainv.id ='".$id."'
            order by ainv.number asc"
            ;
            // and ha.id  ='".$focus->id."'"


            $result = $focus->db->query($sql);

            while ($row = $focus->db->fetchByAssoc($result)) {
               $line_data = json_encode($row);
               echo "<script>insertInvLineData(" . $line_data . ");</script>";
           }
       }
       echo '<script>insertLineFootor(\'lineItems\');</script>';

}

function getPeriodName($frm_id,$pay_date){
    $focus=$this->bean;
      $periods_info = array();

      $sql = "SELECT
             perl.id,
             perl.name
           from 
             haa_period_sets perh,
             haa_periods perl
           where 1=1
           and perh.deleted = 0
           and perl.deleted = 0
           and perh.haa_frameworks_id_c = '".$frm_id."'
           and perh.enabled_flag = 1
           and perh.id = perl.haa_period_sets_id_c
           and perl.start_date <= '".$pay_date."'
           and perl.end_date >= '".$pay_date."'"
           ;
        $result = $focus->db->query($sql);
           while ($row = $focus->db->fetchByAssoc($result)) {
            //$line_data = json_encode($row);
            $periods_info['periods_id'] = $row['id'];
            $periods_info['periods_name'] = $row['name'];
         }
       
       return $periods_info;
  }

}
