<?php
if(!defined('sugarEntry')||!sugarEntry)die('NotAValidEntryPoint');

require_once('include/MVC/View/views/view.list.php');

class HAA_FunctionsViewList extends ViewList
{
	function processSearchForm(){
		parent::processSearchForm();

		global $current_user;
		$current_user_id =$current_user->id;
		$user_bean = BeanFactory::getBean('Users',$current_user_id);
		$haa_frameworks_id=$user_bean->haa_frameworks_id1_c;
		if ($haa_frameworks_id != ''){
			if ($this->where) {
				$this->where.=" and  IF (
				haa_frameworks_id_c is not NULL,
				haa_frameworks_id_c,
				'".$haa_frameworks_id."'
				)='".$haa_frameworks_id."'";
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
