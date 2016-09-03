<?php
require_once('include/MVC/Controller/SugarController.php');

class HAA_FrameworksController extends SugarController
{
	function action_setframework(){
		if (isset($_REQUEST['framework_id'])){
			$_SESSION["current_framework"]=$_REQUEST['framework_id'];
			//将当前的framework_id写入Session

			$Bean_list = BeanFactory::getBean('HAM_Maint_Sites')->get_full_list('name',"ham_maint_sites.haa_frameworks_id='".$_REQUEST['framework_id']."'");
			$site_field = "";

	        if (isset($Bean_list)) { //如果当前列表中有值才进行加载
	            $current_site=isset($_SESSION["current_site"])?$_SESSION["current_site"]:''; //获取当前的业务框架，如果已经设置，应当为ID
	            foreach ($Bean_list as $d) {
	            	$site_field .= "<option value='".$d->id."' ".(($current_site==$d->id)?"selected='selected'":"")."'>".$d->name."</option>";
	            }
	            echo($site_field);
	        }
    	}

	}

	function action_setsite(){
		if (isset($_REQUEST['site_id'])){
			$_SESSION["current_site"]=$_REQUEST['site_id'];
			//将当前的site_id写入Session
    	}

	}

}

?>
