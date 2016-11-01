<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once('include/MVC/View/views/view.popup.php');

class HAA_CodesViewPopup extends ViewPopup
{

    function Display() {

		if (empty($_REQUEST['haa_frameworks_id_advanced'])) {		//如果界面没有供出对应的值，此仅列出当前Session选定组织的Framework
			$haa_frameworks_id=$_SESSION["current_framework"];
			$_REQUEST['haa_frameworks_id_advanced']=$haa_frameworks_id;
		}

       parent::Display();
        echo'<script>$("#code_type_advanced").closest("td").hide()</script>';
        echo'<script>$("#code_type_advanced").closest("td").prev("td").hide()</script>';
    }

}
