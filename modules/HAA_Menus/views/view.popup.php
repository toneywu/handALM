<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAA_MenusViewPopup extends ViewPopup
{

	function Display() {

          if (empty($_REQUEST['haa_frameworks_id_c_advanced'])) {          //如果界面没有供出对应的值，此仅列出当前Session选定组织的Framework
          	global $current_user;
          	$current_user_id =$current_user->id;
          	$user_bean = BeanFactory::getBean('Users',$current_user_id);
          	$haa_frameworks_id=$user_bean->haa_frameworks_id1_c;
          	$_REQUEST['haa_frameworks_id_c_advanced']=$haa_frameworks_id;
          }

          parent::Display();

      }

  }