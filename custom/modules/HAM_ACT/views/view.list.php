<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAM_ACTViewList extends ViewList
{
    function Display() {
        global $app_list_strings;
        $this->ss->assign('APP_LIST', $app_list_strings);
        parent::Display();
    }

    function processSearchForm(){
      parent::processSearchForm();
      $haa_frameworks_id=$_SESSION["current_framework"];
        if ($this->where) { 
          $this->where.=" AND ham_act.haa_frameworks_id ='".$haa_frameworks_id."'";
        }else{
          $this->where=" ham_act.haa_frameworks_id ='".$haa_frameworks_id."'";
        }
    }
}
