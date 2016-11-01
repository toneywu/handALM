<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
require_once('include/MVC/View/views/view.list.php');

class HAT_AssetsViewList extends ViewList
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
  $haa_frameworks_id=$_SESSION["current_framework"];
  if ($this->where) {
    $this->where.=" and haa_frameworks_id='".$haa_frameworks_id."'";
  }else{
    $this->where="haa_frameworks_id='".$haa_frameworks_id."'";
  }
}
/*    function listViewProcess(){


		$c = BeanFactory::getBean('HAT_Assets',$this->bean->id);
		   //because that field is not included in my list view. By using the $bean id to retrieve a copy of the full bean (which I called $c)
		   //Ref:http://developer.sugarcrm.com/2012/10/15/conditional-formatting-on-cases-list-view-and-dashlets/
		$val = translate($c->field_defs['asset_status']['options'],'', $c->asset_status);
		//$this->bean->asset_status_displayed = "<span class='color_tag color_asset_status_{$c->asset_status}'>tag:{$val}</span>";
		
		$this->bean->asset_status = "test";//"<span class='color_tag color_asset_status_{$c->asset_status}'>tag:{$val}</span>";

		/*foreach($this->bean as $key => $value) {
           print "$key => $value\n";
       }

        parent::listViewProcess();
      }*/
    }
