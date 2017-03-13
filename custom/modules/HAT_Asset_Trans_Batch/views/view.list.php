<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_Asset_Trans_BatchViewList extends ViewList
{
  function Display() {
    global $app_list_strings;
    $this->ss->assign('APP_LIST', $app_list_strings);

    parent::Display();
  }

  function processSearchForm(){
    parent::processSearchForm();
    $haa_frameworks_id=$_SESSION["current_framework"];
    $this->where=empty($this->where)?' 1=1 ':$this->where;
    $this->where.=" and hat_asset_trans_batch.haa_frameworks_id='".$haa_frameworks_id."'";


    //根据功能拆分过滤数据
    if($_GET['function_code']!=''){
      $_SESSION['halm_function_parameter']=$_GET;
    }
    if (!empty($_SESSION['halm_function_parameter']['function_code'])){
      $eventTypeString='';
      //功能代码匹配事件类型的TAG-》过滤资产事务处理

      $beanTypes = BeanFactory::getBean('HAT_EventType')->get_full_list('name',"hat_eventtype.tag='".$_SESSION['halm_function_parameter']['function_code']."'");

      if (isset($beanTypes)) {
        foreach ($beanTypes as $beanLine) {
          $eventTypeString.="'".$beanLine->id."',";
        }
      }
      $eventTypeString=rtrim($eventTypeString,',');
      if($eventTypeString!=''){
        $this->where=empty($this->where)?' 1=1 ':$this->where;
        $this->where.=" and hat_asset_trans_batch.hat_eventtype_id in (".$eventTypeString.") ";

      }
    }
      //End 功能拆分
  }
}
