<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class AOS_ProductsViewPopup extends ViewPopup
{

    function Display() {
        //限制contract_flag_c_advanced
         if($_REQUEST['contract_flag_c_advanced']){
           $_SESSION['contract_flag_c_advanced']=$_REQUEST['contract_flag_c_advanced'];   
         }
         if($_SESSION['contract_flag_c_advanced']){
            $_REQUEST['contract_flag_c_advanced']=$_SESSION['contract_flag_c_advanced'];
         }

          if (empty($_REQUEST['haa_frameworks_id_c_advanced'])) {          //如果界面没有供出对应的值，此仅列出当前Session选定组织的Framework
               $haa_frameworks_id=$_SESSION["current_framework"];
               $_REQUEST['haa_frameworks_id_c_advanced']=$haa_frameworks_id;
          }
       //var_dump($_SESSION['AOS_Products2_QUERY']);
       parent::Display();
      
   
     var_dump($_SESSION['AOS_Products2_QUERY']);

    }



}