<?php
    unset($global_control_links['training']);
    unset($global_control_links['about']);
    unset($global_control_links['employees']);
   // $global_control_links['Knowledge Base'] = array('linkinfo' => array('Knowledge Base'=>'http://www.handalm.com/kb'));

    $global_control_links['Knowledge Base'] = array(
		'linkinfo' => array($app_strings['LBL_KB'] => 'javascript:void(window.open(\'http://www.handalm.com/kb\'))'),
		'submenu' => ''
		 );

	global $current_user; 
  
    if (is_admin($current_user) ) {          //echo 'This module is  //show quick repair link for admin.
	    $global_control_links['QuickRepair'] = array(
			'linkinfo' => array($app_strings['LBL_QUICKREPAIR'] => 'javascript:void(window.open(\'index.php?module=Administration&action=repair\'))'),
			'submenu' => ''
			 );

	    $global_control_links['ViewLog'] = array(
			'linkinfo' => array($app_strings['LBL_DISPLAY_LOG'] => 'javascript:void(window.open(\'index.php?module=Configurator&action=LogView\'))'),
			'submenu' => ''
			 );

	}


?>