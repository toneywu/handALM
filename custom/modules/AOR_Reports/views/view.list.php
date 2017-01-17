<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class AOR_ReportsViewList extends ViewList
{
  function Display() {
    global $app_list_strings;
    $this->ss->assign('APP_LIST', $app_list_strings);

    parent::Display();
  }
/*
 *  重写方法，添加where条件
 */
function processSearchForm(){
  parent::processSearchForm();
  $user_bean = BeanFactory::getBean('Users',$_SESSION["authenticated_user_id"]);
  //echo '   ---'.$user_bean->haa_frameworks_id1_c.'---';
  
  
  $haa_frameworks_id=$user_bean->haa_frameworks_id1_c;
  //$_SESSION["current_framework"];
  if ($haa_frameworks_id != ''){
    if ($this->where) {
     $this->where.=" and  IF (
     haa_frameworks_id_c is not NULL,
     haa_frameworks_id_c,
     '".$haa_frameworks_id."'
     )='".$haa_frameworks_id."'";
    // $this->where.=" and haa_frameworks_id_c='".$haa_frameworks_id."'";
    }
    else{
    $this->where.=" IF (
    haa_frameworks_id_c is not NULL,
    haa_frameworks_id_c,
    '".$haa_frameworks_id."'
    )='".$haa_frameworks_id."'";
    }
  }
}

}
