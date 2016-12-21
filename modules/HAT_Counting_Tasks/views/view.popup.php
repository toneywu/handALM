<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAT_Counting_TasksViewPopup extends ViewPopup
{

    function Display() {

          if (empty($_REQUEST['haa_frameworks_id_c_advanced'])) {          //如果界面没有供出对应的值，此仅列出当前Session选定组织的Framework
               $haa_frameworks_id=$_SESSION["current_framework"];
               $_REQUEST['haa_frameworks_id_c_advanced']=$haa_frameworks_id;
          }

       parent::Display();

    }

}